<?php
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, OPTIONS');
header('Access-Control-Allow-Headers: Content-Type');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') { exit(0); }
if ($_SERVER['REQUEST_METHOD'] !== 'POST') { http_response_code(405); echo json_encode(['ok'=>false,'msg'=>'Método no permitido']); exit; }
$data = json_decode(file_get_contents('php://input'), true);
$u = isset($data['usuario']) ? trim($data['usuario']) : '';
$p = isset($data['contrasena']) ? $data['contrasena'] : '';
if (!$u || !$p) { echo json_encode(['ok'=>false,'msg'=>'Faltan datos']); exit; }
$c = @mysqli_connect('127.0.0.1', 'root', '116630', 'midnaOsDB', 3306);
if (!$c) {
  echo json_encode(['ok'=>false,'msg'=>'Error de conexión', 'errno'=>mysqli_connect_errno(), 'error'=>mysqli_connect_error()]);
  exit;
}
$stmt = mysqli_prepare($c, 'SELECT contrasena FROM usuarios WHERE usuario=?');
mysqli_stmt_bind_param($stmt, 's', $u);
mysqli_stmt_execute($stmt);
mysqli_stmt_bind_result($stmt, $hash);
if (!mysqli_stmt_fetch($stmt)) {
  mysqli_stmt_close($stmt); mysqli_close($c);
  echo json_encode(['ok'=>false,'msg'=>'Usuario o contraseña incorrectos']);
  exit;
}
mysqli_stmt_close($stmt);
if (password_verify($p, $hash)) { echo json_encode(['ok'=>true]); }
else { echo json_encode(['ok'=>false,'msg'=>'Usuario o contraseña incorrectos']); }
mysqli_close($c);
