<template>
    <div class="container">
        <div id="success" class="mb-3"></div>
        
       <a style="cursor: pointer" @click.prevent="dislikeBlog">
           <i class="fa fa-thumbs-o-down" aria-hidden="true"></i> 
           ({{ alldislike }})
       </a>
    </div>
</template>
<script>
import axios from "axios";
  export default {
      props:['blog'],
      data(){
          return {
              alldislike:'',
          }
      },
      methods:{
          dislikeBlog(){
              axios.post('/dislike/'+this.blog, {post: this.blog})
              .then(res =>{
                this.alldislike = parseInt(this.alldislike) + 1;
                $('#success').html(res.data.message)
              })
              .catch(error => {
                    console.log(error.message);
                })
          },
          renderDislike(){
            axios.post('/dislike', {post:this.blog})
            .then(res =>{
              if (res.data.post === null) {
                // 처리할 코드 추가
                console.log("post is null");
                return;
              }
              this.alldislike = res.data.post.dislike;
            })
          }
      },
      mounted() {
          this.renderDislike()
      }
  }
</script>