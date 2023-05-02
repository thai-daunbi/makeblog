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
  props: ["post"],
  data() {
    return {
      alldislikes: null,
    };
  },
  methods: {
    renderDislike() {
      axios
        .get(`/api/post/${this.post.id}/dislike`)
        .then((res) => {
          console.log(res.data.post.dislike);
          this.alldislikes = res.data.post.dislike || 0;
        })
        .catch((err) => console.log(err.response.data));
    },
    dislike() {
      axios
        .post(`/api/post/${this.post.id}/dislike`)
        .then((res) => {
          console.log(res.data.post.dislike);
          this.alldislikes = res.data.post.dislike;
        })
        .catch((err) => console.log(err.response.data));
    },
  },
  mounted() {
    this.renderDislike();
  },
};
</script>

<!-- <script>
    export default {
        props:['post'],
        data(){
            return {
                allDislike:'',
            }
        },
        methods:{
            dislikeBlog(){
                axios.post('/dislike/'+this.post, {post: this.post})
                .then(res =>{
                    this.renderDislike()
                    $('#success').html(res.data.message)
                })
                .catch()
            },
            renderDislike(){
                axios.post('/dislike', {post:this.post})
                .then(res => {
                    console.log(res.data.post.dislike);
                    this.allDislike = res.data.post.dislike || 0; // null이면 0으로 초기화
                })
                // .then(res =>{
                //     console.log(res.data.post.dislike)
                //     this.allDislike = res.data.post.dislike
                // })
            }
        },
        mounted() {
            this.renderDislike()
        }
    }
</script> -->