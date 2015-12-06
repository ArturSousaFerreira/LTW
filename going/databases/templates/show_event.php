<header>
    <div id="footer_detail_event">

        <h2>Event info</h2>
        <ul>
            <li><?=$event['description'] ?></li>
            <li><?= $event['type']?> by <a href="show_user.php?username=<?=$event['creator']?>"> <?=$event['creator'] ?></a>
            <li>Date: <?=$event['date'] ?></li>
            <li><img src=<?=$event['image']?> width="200px" height="200px" ></li>
        </ul>

        <h4>Registered</h4>
        <?php if (count($registered) <= 0) echo "<p>No users registered to this event yet</p>" ?>
        <ul>
            <?php foreach ($registered as $reg) { ?>
                <li><a href="show_user.php?username=<?=$reg['user']?>"><?=$reg['user']?></a></li>
            <?php } ?>
        </ul>

        <h4>Comments</h4>
        <ul>
            <?php
            if (count($comments) > 0) {
                foreach ($comments as $comment) { ?>
                    <li class="comment">
                        <a href="show_user.php?username=<?=$comment['author']?>">
                            <?=$comment['author']?>
                        </a>
                        <?=$comment['text']?>
                    </li>
                <?php }
            } else { ?>
                <li>No comments yet :(</li>
            <?php } ?>
        </ul>

