<?php snippet('header') ?>

<ul>
  <nav class="nextprev cf" role="navigation">
      <?php if($prev = $page->prevVisible()): ?>
      <a class="prev tag morado" href="<?php echo $prev->url() ?>">&larr; anterior</a>
      <?php endif ?>
      <?php if($next = $page->nextVisible()): ?>
      <a class="next tag morado" href="<?php echo $next->url() ?>">siguiente &rarr;</a>
      <?php endif ?>
</nav>
</ul>

<div class="row">
  <div class="large-12 columns">

    
 </div>
    
</div>
  
<div class="row">
  <div class="large-8 columns">
    <!-- TITULO -->
    <h1><?php echo $page->title()->html() ?></h1>


    <!-- TAGS -->
    <ul class="tags">
      
      <?php foreach($tags as $tag): ?>
        <li>
          <a href="<?php echo $page->url() . '/tag:' . $tag ?>">
            <?php echo html($tag) ?>
          </a>
        </li>
      <?php endforeach ?>
          
    </ul>
    <ul class="vi">

      <!-- VIDEO 1 -->
      <?php if($page->convideo() == 'si'): ?>
        <li>
          <div class="FitMyVideo-container"><?php echo kirbytext($page->video()) ?>
          </div>
        </li>
      <?php endif ?>
      <!-- VIDEO 2 -->
      <?php if($page->convideo2() == 'si'): ?>
        <li>
          <div class="FitMyVideo-container"><?php echo kirbytext($page->video2()) ?>
          </div>
        </li>
      <?php endif ?>
      <!-- VIDEO 3 -->
      <?php if($page->convideo3() == 'si'): ?>
        <li>
          <div class="FitMyVideo-container"><?php echo kirbytext($page->video3()) ?>
          </div>
        </li>
      <?php endif ?>

    </ul>

    

  </div>

</div>

<div class="row">
  <div class="large-12 columns">

    

    

    
    <ul class="gallery">
    <?php foreach($page->images()->sortBy('sort', 'asc') as $image): ?>
    
      <li>
        <a href=""><img class ="thumb" src="<?php echo $image->url() ?>" alt="<?php echo $page->title()->html() ?>"></a>
      </li>
    
    <?php endforeach ?>
    </ul>
    

  </div>
    
</div>



<?php snippet('footer') ?>