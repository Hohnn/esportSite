<?php 

function displayCard($i)
{
    $link = 'https://www.jeuxonline.info/rss/actualites/rss.xml';
    $doc = simplexml_load_file($link);
    $imgUrl = $doc->channel->item[$i]->enclosure["url"];
    $title = $doc->channel->item[$i]->title;
    $category = $doc->channel->item[$i]->category;
    $author = $doc->channel->item[$i]->author;
    $desc = $doc->channel->item[$i]->description;
    $source = $doc->channel->item[$i]->link;
    $date = $doc->channel->item[$i]->pubDate;
    $format = strftime('%H:%M %d/%m/%Y', strtotime($date));
?>
    <div class="col">
            <div class="card ">
            <img class="imgCard" src="<?= $imgUrl?>" alt="">
                <div class="desc text-white">
                    <h2 class="title"><?= $category ?></h2>
                    <div class="date"><?= $format ?></div>
                    <div class="sujet"><?= $title ?></div>
                    <div class="auteur"><?= $author?></div>
                    <button type="button">Voir</button>
                </div>
            </div>
        </div>
 <?php } ?>   