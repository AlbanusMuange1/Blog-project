<div class="col-md-6">
      <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
        <div class="col p-4 d-flex flex-column position-static">
          <strong class="d-inline-block mb-2 text-primary-emphasis"><?=esc($row['category'] ?? 'Unknow')?></strong>
          <h3 class="mb-0"><?=esc($row['title'])?></h3>
          <div class="mb-1 text-body-secondary"><?=date("jS M, Y", strtotime($row['date']))?></div>
          <p class="card-text mb-auto"><?=esc(substr(filter_var($row['content'], FILTER_SANITIZE_STRING), 0, 150,))?></p>
          <a href="<?=ROOT?>/post/<?=$row['slug']?>" class="icon-link gap-1 icon-link-hover stretched-link">
            <svg class="bi"><use xlink:href="#chevron-right"/></svg>
            Continue reading
          </a>
        </div>
        <div class="col-lg-6 col-12 d-lg-block">
          <img src="<?=get_image($row['image'])?>" alt="" class="bd-placeholder-img w-100" width="200" height="250" style="object-fit: cover;">
        </div>
     </div>
</div>