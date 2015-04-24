<div class="row">
  <div class="large-12 columns">
    <ul id="projects">
      <?php foreach(page('projects')->children()->visible() as $project): ?>
      <li class="project isotope-item">
        <p class="date"><?php echo $project->date('M j') ?></p>
        
        
        <?php if($image = $project->images()->sortBy('sort', 'asc')->first()): ?>
        <a href="<?php echo $project->url() ?>">
          <img class="thumb" src="<?php echo $image->url() ?>" alt="<?php echo $project->title()->html() ?>" >
          <p class="title"><?php echo $project->title()->html() ?></p>
        </a>
        <?php endif ?>

        <ul class="tags">

          <?php
          $count = 0;
          foreach ($tags = explode(",", $project->tags()) as $tag) {
          $count++;
          echo '<li><a href="'.url().'projects/tag:'.urlencode(trim($tag)).'">'.str_replace('-',' ', $tag).'</a></li>';
          // if ($count != count($tags)) {echo ',';}
          }
          ?>
        </ul>




      </li>
      <?php endforeach ?>
    </ul>

  </div>
</div>


