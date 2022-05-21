<!DOCTYPE html>
<html lang="en-US">
  <?php $db = new PDO('sqlite:news.db'); ?>
  <head>
    <title>Super Legit News</title>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="style.css" rel="stylesheet">
    <link href="layout.css" rel="stylesheet">
    <link href="responsive.css" rel="stylesheet">
    <link href="comments.css" rel="stylesheet">
    <link href="forms.css" rel="stylesheet">
  </head>
  <body>
    <header>
      <h1><a href="index.html">Super Legit News</a></h1>
      <h2><a href="index.html">Where fake news are born!</a></h2>
      <div id="signup">
        <a href="register.html">Register</a>
        <a href="login.html">Login</a>
      </div>
    </header>
    <nav id="menu">
      <!-- just for the hamburguer menu in responsive layout -->
      <input type="checkbox" id="hamburger"> 
      <label class="hamburger" for="hamburger"></label>

      <ul>
        <li><a href="index.html">Local</a></li>
        <li><a href="index.html">World</a></li>
        <li><a href="index.html">Politics</a></li>
        <li><a href="index.html">Sports</a></li>
        <li><a href="index.html">Science</a></li>
        <li><a href="index.html">Weather</a></li>
      </ul>
    </nav>
    <aside id="related">
      <?php
        $stmt = $db->prepare('SELECT * FROM news');
        $stmt->execute();
        $articles = $stmt->fetchAll();
        foreach( $articles as $article) {
          echo '<article><h1><a href = "#">' . $article['title'] . '</a></h1>';
          echo '<p>' . $article['introduction'] . '</p></article>';
      }
      ?>
    </aside>
    <section id="news">
      <?php
        $stmt = $db->prepare('SELECT news.*, users.*, COUNT(comments.id) AS comments
                              FROM news JOIN users USING (username)
                              LEFT JOIN comments ON comments.news_id = news.id
                              GROUP BY news.id, users.username
                              ORDER BY published DESC');
        $stmt->execute();
        $articles = $stmt->fetchAll();
        foreach($articles as $article){
          echo '<article>';
          echo '<header><h1><a href = "item.html">' . $article['title'] . '</a></h1></header>';
          echo '<img src="https://picsum.photos/600/300?business" alt="">';
          echo '<p>' . $article['fulltext'] . '<p>';
          echo '<footer>';
          echo '<span class = author">' . $article['username']. '</span>';
          $tags = explode('.', $article['tags']);
          echo '<span class = "tags">' . $tags . '</span>';
          $date = date('F j', $article['published']);
          echo '<span class = "date">' . $date . '</span>';
          echo '<a class = "comments" href ="item.html#comments">' . $article['comments'] . '</a>';
          echo '</footer></article>';
        }
        ?>
    </section>
    <footer>
      <p>&copy; Fake News, 2022</p>
    </footer>
  </body>
</html>
