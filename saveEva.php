<?php
	session_start();

	if (
		!isset($_SESSION['username'], $_SESSION['role']) ||
		trim((string) $_SESSION['username']) === '' ||
		trim((string) $_SESSION['role']) === ''
	) {
		header('Location: index.php');
		exit();
	}

	include 'connect_db.php';

	$scores = $_POST['score_member'] ?? [];
	if (!is_array($scores) || count($scores) === 0) {
		header('Location: selfeva.php');
		exit();
	}

	$memberStmt = $conn->prepare('SELECT id_member FROM tb_member WHERE username = ? AND role = ?');
	$memberStmt->bind_param('ss', $_SESSION['username'], $_SESSION['role']);
	$memberStmt->execute();
	$member = $memberStmt->get_result()->fetch_assoc();

	if (!$member) {
		header('Location: index.php');
		exit();
	}

	$conn->begin_transaction();

	try {
		$deleteDetailStmt = $conn->prepare('DELETE tb_detail FROM tb_detail INNER JOIN tb_eva ON tb_detail.id_eva = tb_eva.id_eva WHERE tb_eva.id_member = ?');
		if (!$deleteDetailStmt) {
			throw new Exception($conn->error);
		}
		$deleteDetailStmt->bind_param('i', $member['id_member']);
		if (!$deleteDetailStmt->execute()) {
			throw new Exception($deleteDetailStmt->error);
		}

		$deleteEvaStmt = $conn->prepare('DELETE FROM tb_eva WHERE id_member = ?');
		if (!$deleteEvaStmt) {
			throw new Exception($conn->error);
		}
		$deleteEvaStmt->bind_param('i', $member['id_member']);
		if (!$deleteEvaStmt->execute()) {
			throw new Exception($deleteEvaStmt->error);
		}

		$evaStmt = $conn->prepare("INSERT INTO tb_eva (id_member, status_eva) VALUES (?, 'y')");
		if (!$evaStmt) {
			throw new Exception($conn->error);
		}
		$evaStmt->bind_param('i', $member['id_member']);
		if (!$evaStmt->execute()) {
			throw new Exception($evaStmt->error);
		}
		$idEva = $conn->insert_id;

		$detailStmt = $conn->prepare('INSERT INTO tb_detail (id_eva, id_indicate, score_member) VALUES (?, ?, ?)');
		if (!$detailStmt) {
			throw new Exception($conn->error);
		}

		foreach ($scores as $idIndicate => $score) {
			$idIndicate = (int) $idIndicate;
			$score = (int) $score;

			if ($idIndicate <= 0 || $score < 1 || $score > 5) {
				throw new Exception('Invalid score data');
			}

			$detailStmt->bind_param('iii', $idEva, $idIndicate, $score);
			if (!$detailStmt->execute()) {
				throw new Exception($detailStmt->error);
			}
		}

		$conn->commit();
		header('Location: eva1.php');
		exit();
	} catch (Throwable $error) {
		$conn->rollback();
		die('ไม่สามารถบันทึกคะแนนได้');
	}
?>
