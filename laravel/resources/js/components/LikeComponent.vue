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
                // console.log("//////////////////////////--------------------");
                // console.log(this.blog);

                axios.post('/like/' + this.blog, {
                            post: this.blog
                    })
                    .then(res => {
                        this.alllikes = parseInt(this.alllikes) + 1;
                        $('#success').html(res.data.message);
                    })
                .catch(error => {
                    console.log(error.message);
                });
            },
            renderLike() {
                // console.log(this.blog);
                axios.post('/like', { post: this.blog })
                .then(res => {
                    if (res.data.post === null) {
                // 처리할 코드 추가
                console.log("post is null");
                return;
            }
            this.alllikes = res.data.post.like;
                })
            }
        },
        mounted() {
            this.renderLike()
        }

    };
</script>
