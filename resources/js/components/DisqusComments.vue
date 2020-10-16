<template>
    <div id="disqus_thread"></div>
</template>

<script>
    export default {
        mounted(){
            (function() {
                var d = document, s = d.createElement('script');
                s.src = 'https://blogus-1.disqus.com/embed.js';
                s.setAttribute('data-timestamp', +new Date());
                (d.head || d.body).appendChild(s);
            })();
        }
    }
</script>
