<?php
function sec_session_start() {
  $session_name = 'sec_session_id'; // Imposta un nome di sessione
  $httponly = true; // Questo impedirà ad un javascript di essere in grado di accedere all'id di sessione.
  ini_set('session.use_only_cookies', 1); // Forza la sessione ad utilizzare solo i cookie.
  $cookieParams = session_get_cookie_params(); // Legge i parametri correnti relativi ai cookie.
  session_set_cookie_params($cookieParams["lifetime"], $cookieParams["path"], $cookieParams["domain"], false, $httponly);
  session_name($session_name); // Imposta il nome di sessione
  session_start(); // Avvia la sessione php.
  session_regenerate_id(); // Rigenera la sessione e cancella quella creata in precedenza.
}

function login($username, $password, $pdo) {
  if($stmt = $pdo->prepare("SELECT username, password, salt FROM admin WHERE username = :usr LIMIT 1")) {
    try {
        $stmt->execute(array(':usr' => $username));//prendo i valori dell'utente dal DB
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        $pdo = null;
        die($e->getMessage());
    } finally {
        $stmt=null;   
    }
    $saltedpswd = hash('sha512', $password.$result['salt']);//ricreo la password con con la password fornita e il salt
    if(count($result) > 0) {
      if($result['password'] == $saltedpswd) { // Verifica password database con quella ricreata a partire dalla pass fornita.
        //se sono uguali il login e' avvenuto con successo e setto le variabili di sessione
        $user_browser = $_SERVER['HTTP_USER_AGENT']; // Recupero il parametro 'user-agent' relativo all'utente corrente.
        $username = preg_replace("/[^a-zA-Z0-9_\-]+/", "", $username); // protezione attacco XSS
        $_SESSION['username'] = $username;
        $_SESSION['login_string'] = hash('sha512', $saltedpswd.$user_browser);//creo una var di sessione legata allo user agent
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

function login_check($pdo) {
  if(isset($_SESSION['username']) and isset($_SESSION['login_string'])) {
    $login_string = $_SESSION['login_string'];
    $username = $_SESSION['username'];
    $user_browser = $_SERVER['HTTP_USER_AGENT'];

    if($stmt = $pdo->prepare("SELECT password FROM admin WHERE username = :usr LIMIT 1")) {
      try {
        $stmt->execute(array(':usr' => $username));//prendo i valori dell'utente dal DB
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
      } catch(PDOException $e) {
        $pdo = null;
        die($e->getMessage());
      } finally {
        $stmt=null;   
      }
      if(count($result) > 0) {
        $password = $result['password'];
        $login_check = hash('sha512', $password.$user_browser);
        if($login_check == $login_string) {
          return true;
        }
      }
    }
  }
  return false;
}
  ?>
