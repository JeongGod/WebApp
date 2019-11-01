<!DOCTYPE html>
<html lang="en">

	<head>
		<title>Music Library</title>
		<meta charset="utf-8" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/5/music.jpg" type="image/jpeg" rel="shortcut icon" />
		<link href="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/labResources/music.css" type="text/css" rel="stylesheet" />
	</head>

	<body>
		<h1>My Music Page</h1>

		<!-- Ex 1: Number of Songs (Variables) -->
		<p>
			<?php
				$song_count=5678;
				$song_time= (int)($song_count/10);
				print "I love music.\n";
				print "I have $song_count total songs,";
				print "which is over $song_time hours of music!";
			?>
		</p>

		<!-- Ex 2: Top Music News (Loops) -->
		<!-- Ex 3: Query Variable -->
		<div class="section">
			<h2>Billboard News</h2>
			<ol>
				<?php
					if(isset($_GET["num"])) {
						$ber = $_GET["num"];
					}
					else{
						$ber = 5;
					}
				    for ($news_page = 11; $news_page >= 7,$ber > 0; $news_page--,$ber--) {
						if ($news_page >= 10) {
							print "<li><a href='https://www.billboard.com/archive/article/2019$news_page'>2019-$news_page</a></li>";
						}
						else {
							print "<li><a href='https://www.billboard.com/archive/article/20190$news_page'>2019-0$news_page</a></li>";
						}
					}
				?>
			</ol>
		</div>

		<!-- Ex 4: Favorite Artists (Arrays) -->
		<!-- Ex 5: Favorite Artists from a File (Files) -->
		<div class="section">
			<h2>My Favorite Artists</h2>

			<ol>
				<?php
				// $name = array("Guns N' Roses", "Green Day", "Blink182", "Queen");
				// for ($i = 0; $i < count($name); $i++){
				// 	print "<li>$name[$i]</li>";
				// }

				foreach (file("favorite.txt") as $list) {
					$name = str_replace(" ", "_", $list);
					$name = str_replace("'", "", $name);
					print "<li><a href='https://en.wikipedia.org/wiki/$name'>$list</a></li>";

				}
				?>
			</ol>
		</div>


		<!-- Ex 7: MP3 Formatting -->
		<div class="section">
			<h2>My Music and Playlists</h2>

			<ul id="musiclist">
				<!-- <li class="mp3item">
					<a href="lab5/musicPHP/songs/paradise-city.mp3">paradise-city.mp3</a>
				</li>
				<li class="mp3item">
					<a href="lab5/musicPHP/songs/basket-case.mp3">basket-case.mp3</a>
				</li>

				<li class="mp3item">
					<a href="lab5/musicPHP/songs/all-the-small-things.mp3">all-the-small-things.mp3</a>
				</li> -->
				<?php
				// <!-- Ex 6: Music (Multiple Files) -->
				// $musics = glob("lab5/musicPHP/songs/*.mp3");
				// foreach ($musics as $musicfile) {
				// 	print "<li class='mp3item'>$musicfile</li>";
				// }

				$musics = glob("lab5/musicPHP/songs/*.mp3");
				foreach ($musics as $musicfile) {
					$musicnames = basename($musicfile);
					$musicsize = (int)(filesize($musicfile)/1024);
					print "<li class='mp3item'><a href='$musicfile'>$musicnames</a> ($musicsize KB)</li>";
				}
				?>

				<!-- Exercise 8: Playlists (Files) -->

				<li class="playlistitem">326-13f-mix.m3u:
					<?php
						$mp3 = glob("lab5/musicPHP/songs/*.m3u");
						foreach ($mp3 as $mp3file) {
							foreach (file($mp3file) as $mp3content){
								print "$mp3content";
							}
						}
					?>
					<!-- <ul>
						<li>Basket Case.mp3</li>
						<li>All the Small Things.mp3</li>
						<li>Just the Way You Are.mp3</li>
						<li>Pradise City.mp3</li>
						<li>Dreams.mp3</li>
					</ul> -->
			</ul>
		</div>

		<div>
			<a href="https://validator.w3.org/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-html.png" alt="Valid HTML5" />
			</a>
			<a href="https://jigsaw.w3.org/css-validator/check/referer">
				<img src="https://selab.hanyang.ac.kr/courses/cse326/2019/labs/images/w3c-css.png" alt="Valid CSS" />
			</a>
		</div>
	</body>
</html>
