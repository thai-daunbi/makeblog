<template>
    <div class="container">
        <div id="success" class="mb-3"></div>
        <a style="cursor: pointer" @click.prevent="likeBlog">
            <i class="fa fa-thumbs-o-up" aria-hidden="true"></i>
            ({{ alllikes }})
        </a>
    </div>
</template>
  
<script>
import axios from "axios";

export default {
    props: ['blog'],
    data() {
        return {
            alllikes: '',
        }
    },
    methods: {
        likeBlog() {
            axios.post('/like/' + this.blog, {
                post: this.blog
            })
                .then(res => {
                    $('#success').html(res.data.message);
                    // 좋아요 수를 업데이트하기 위해 fetchLikes 메서드 호출
                    this.fetchLikes();
                })
                .catch(error => {
                    console.log(error);
                });
        },
        fetchLikes() {
            axios.post('/like', { post: this.blog })
                .then(res => {
                    if (res.data.post === null) {
                        console.log("post is null");
                        return;
                    }
                    this.alllikes = res.data.post.like;
                });
        }
    },
    mounted() {
        this.fetchLikes();
    }
};
</script>
  