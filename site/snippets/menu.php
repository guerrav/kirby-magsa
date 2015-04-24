<nav>

  <ul>
    <?php foreach($pages->visible() as $p): ?>
    <li class="tag">
      <?php if($p->title() == 'Mapa y contacto'): ?>
        <span class="fa fa-map-marker"></span>
        

        <?php else: ?>
        <span class="fa fa-folder-open"></span>
        
      <?php endif ?>
      <a class="ubica" href="<?php echo $p->url() ?>"><?php echo $p->title()->html() ?></a>
     
    </li>
    <?php endforeach ?>
  </ul>

</nav>
