<?php
require_once 'resources/lib/getProgression.php';

$progression = getProgression();

  foreach ($progression as $raid) { ?>
    <div class="row">
  
    <h2> <?php echo $raid->getName(); ?></h2>    
    <div class="col-md-4">
      <h3>Normal</h3>
      <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $raid->getNormalPct(); ?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $raid->getNormalPct(); ?>%;">
          <?php 
            echo $raid->getNormal();
            echo "/";
            echo $raid->getMax();
          ?>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <h3>Heroic</h3>
      <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $raid->getHeroicPct(); ?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $raid->getHeroicPct(); ?>%;">
          <?php 
            echo $raid->getHeroic();
            echo "/";
            echo $raid->getMax();
          ?>
        </div>
      </div>
    </div>

    <div class="col-md-4">
      <h3>Mythic</h3>
      <div class="progress">
        <div class="progress-bar" role="progressbar" aria-valuenow="<?php echo $raid->getMythicPct(); ?>" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em; width: <?php echo $raid->getMythicPct(); ?>%;">
          <?php 
            echo $raid->getMythic();
            echo "/";
            echo $raid->getMax();
          ?>
        </div>
      </div>
    </div>
  </div>
<?php
  }

?>