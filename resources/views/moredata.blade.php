<?php
/*$j = count($portfolios);
$number = 8;
$k = 1;
  for ($i=0; $i < $j; $i++) {
    if($i % $number == 0){
        echo '<div class="cbp-loadMore-block'.$k.'"></div>';

    <?php $k++; }
  }*/

  $chunk_arrays = array_chunk($portfolios,8);

  for ($i=0; $i < count($chunk_arrays); $i++) {
    echo '<div class="cbp-loadMore-block'.$i.'">';
    foreach ($chunk_arrays[$i] as $portfolio) { ?>
      <div class="cbp-item {{$portfolio->technology}}">
          <div class="cbp-caption">
              <div class="cbp-caption-defaultWrap">
                  <img src="{{ URL::asset('template/frontend/images/'.$portfolio->image) }}" alt="">
              </div>
              <div class="cbp-caption-activeWrap">
                  <div class="cbp-l-caption-alignCenter">
                      <div class="cbp-l-caption-body">
                          <a href="{{url('portfoliodetail/'.$portfolio->portfolioid)}}" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                          <a href="{{ URL::asset('template/frontend/images/'.$portfolio->image) }}" class="cbp-lightbox cbp-l-caption-buttonRight">view larger</a>
                      </div>
                  </div>
              </div>
          </div>
          <div class="cbp-l-grid-projects-title">{{$portfolio->title}}</div>
          <div class="cbp-l-grid-projects-desc">{{$portfolio->technology}}</div>
      </div>
    <?php  }
    echo '</div>';
  }

 ?>
 <?php /* ?>
 <div class="cbp-loadMore-block1">
   <?php foreach ($portfolios as $portfolio): ?>
     <div class="cbp-item {{$portfolio->technology}}">
         <div class="cbp-caption">
             <div class="cbp-caption-defaultWrap">
                 <img src="{{ URL::asset('template/frontend/images/'.$portfolio->image) }}" alt="">
             </div>
             <div class="cbp-caption-activeWrap">
                 <div class="cbp-l-caption-alignCenter">
                     <div class="cbp-l-caption-body">
                         <a href="{{url('portfoliodetail/'.$portfolio->portfolioid)}}" class="cbp-singlePage cbp-l-caption-buttonLeft" rel="nofollow">more info</a>
                         <a href="{{ URL::asset('template/frontend/images/'.$portfolio->image) }}" class="cbp-lightbox cbp-l-caption-buttonRight">view larger</a>
                     </div>
                 </div>
             </div>
         </div>
         <div class="cbp-l-grid-projects-title">{{$portfolio->title}}</div>
         <div class="cbp-l-grid-projects-desc">{{$portfolio->technology}}</div>
     </div>
   <?php endforeach; ?>
 </div>
 <?php */ ?>
