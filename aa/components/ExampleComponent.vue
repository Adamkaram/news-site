<template>



      <div class="mt-12 " style="margin-right:80px;   border-radius: 50px 20px;">
            <div v-for="news in  news.data" >
   <div  id="carousel-example-2 " class="carousel slide carousel-fade col-md-8" data-ride="carousel">
  <!--Indicators-->

  <!--/.Indicators-->
  <!--Slides-->
  <div class="carousel-inner "  style="margin-top:20px; margin-bottom:20px;" role="listbox">
    <div class="carousel-item active">
        <div class="view" >
            <img class="d-block rounded carousel-vue"  style="width:740px;"  src=""
                alt="First slide">
                <div class="mask rgba-black-light"></div>
            <div class="carousel-caption" >
        <h3 class="h3-responsive " style="   white-space: normal; margin-top:100px; margin-left:200px; font-size:90x; background-color:black;   transform: rotate(-6deg);"><span style="color:red;">"</span>
       {{news.title}}<span style="color:red">"</span></h3>
    </div>
</div>
    </div>
      </div>



        <a class="carousel-control-prev" href="#carousel-example-2" role="button" data-slide="prev">
            <span  class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#carousel-example-2" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
        </div>

                </div>
                </div>
</template>

<script>


import { mdbCarousel } from 'mdbvue/lib/components/mdbCarousel'
import { mdbInput } from 'mdbvue/lib/components/mdbInput'
export default {


    props:{
          entity_image:{
                 required: true,
                 default: () => []
        },
                default_news:{
                 required: true,
                 default: () => {}
        },},



    data() {
            return {
            news: this.default_news,
            image:this.entity_image
           }
        },


}
</script>
