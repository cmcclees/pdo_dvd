<?php
/**
 * Created by PhpStorm.
 * User: cmcclees
 * Date: 1/21/14
 * Time: 5:30 PM
 */
$host = 'itp460.usc.edu';
$user = 'student';
$pass = 'ttrojan';
$dbname = 'dvd';

$title = $_GET['dvd_title'];

$pdo = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);

$sql = "
  SELECT title, genre, rating, format
    FROM dvd_titles
    INNER JOIN genres ON dvd_titles.genre_id = genres.id
    INNER JOIN ratings ON dvd_titles.rating_id = ratings.id
    INNER JOIN formats ON dvd_titles.format_id = formats.id
    WHERE dvd_titles.title LIKE ?
    ORDER BY dvd_titles.title ASC
";

$statement = $pdo->prepare($sql);

$like = '%'.$title.'%';
$statement->bindParam(1, $like);
$statement->execute();
$dvds = $statement->fetchAll(PDO::FETCH_OBJ);


?>
<?php  echo "You searched for: '$title':"?>

<?php foreach($dvds as $dvd) : ?>
    <table border="2px" width="50%">
        <tr><td><h3>
                <?php echo $dvd->title?>
            </h3>
            <p> <b>Genre:</b> <?php echo $dvd->genre?> </br>
                <b>Rating:</b> <?php echo $dvd->rating?> </br>
                <b>Format:</b> <?php echo $dvd->format?></p>
        </td></tr>
   </table>
<?php endforeach; ?>