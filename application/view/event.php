<section class="event-section">
<?php foreach($event as $item){ ?>
        <div class="event">
            <h1><?php echo $item['eventNom']; ?></h1>
            <p>
                <?php echo $item['description']; ?>
            </p>
        </div>
<?php } ?>
</section>
