<?php
App::uses('AppHelper', 'View/Helper');

class InputTextHelper extends AppHelper {
	//mysqlに突っ込む際に特殊文字をエスケープする。
	public function r($s){
		return mysql_real_escape_string($s);
	}

	//特殊文字をエスケープ・変換する。
	public function h($s){
		return htmlspecialchars($s);
	}

	 
	// $str にURLが含まれていたらリンク
	public function autoLinker($str){
	    $pat_sub = preg_quote('-._~%:/?#[]@!$&\'()*+,;=', '/'); // 正規表現向けのエスケープ処理
	    $pat  = '/((http|https):\/\/[0-9a-z' . $pat_sub . ']+)/i'; // 正規表現パターン
	    $rep  = '<a href="\\1" target="_blank">\\1</a>'; // \\1が正規表現にマッチした文字列に置き換わります
	    $str = preg_replace ($pat, $rep, $str); // 実処理
	    return $str;
	}


	public function jump($s) {
	    header('Location: '.SITE_URL.$s);
	    exit;
	}

	//$id1が、$id2をフォローしているかどうかのフラグ
	public function following($id1,$id2){
	    $sql="SELECT * FROM follows WHERE user_id =".$id1." AND followed_user_id =".$id2;
	    $res = mysql_query($sql);
	    $flag="yes";
	    if(mysql_num_rows($res) ==0){
	        $flag=null;
	    }
	    return $flag;
	    // return mysql_num_rows($res);
	}
}