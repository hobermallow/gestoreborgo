<?php
function sec_session_start() {
  $session_name = 'sec_session_id'; // Imposta un nome di sessione
  $httponly = true; // Questo impedirà ad un javascript di essere in grado di accedere all'id di sessione.
  ini_set('session.use_only_cookies', 1); // Forza la sessione ad utilizzare solo i cookie.
  $cookieParams = session_get_cookie_params(); // Legge i parametri correnti relativi ai cookie.
  session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], false, $httponly);
  session_name($session_name); // Imposta il nome di sessione con quello prescelto all'inizio della funzione.
  session_start(); // Avvia la sessione php.
  session_regenerate_id(); // Rigenera la sessione e cancella quella creata in precedenza.
}

function login($username, $password, $pdo) {
  if($stmt = $pdo->prepare("SELECT username, password, salt FROM admin WHERE username = :usr LIMIT 1")) {
    $stmt->execute(array(':usr' => $username));
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    $saltedpswd = hash('sha512', $password.$result['salt']);
    if(count($result) > 0) {
      if($result['password'] == $saltedpswd) { // Verifica che la password memorizzata nel database corrisponda alla password fornita dall'utente.
        // Password corretta!
        $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.
        $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // ci proteggiamo da un attacco XSS
        $_SESSION['username'] = $username;
        $_SESSION['login_string'] = hash('sha512', $saltedpswd.$user_browser);
        // Login eseguito con successo.
        return true;
      } else {
        return false;
      }
    } else {
      return false;
    }
  } else {
    return false;
  }
}
?>
