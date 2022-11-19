<div id="disqus_thread"></div>
<script>
    var disqus_config = function () {
    this.page.url = '{{ url()->current() }}';
    this.page.identifier = '{{ request()->path() }}';
    };
    (function() { // DON'T EDIT BELOW THIS LINE
    var d = document, s = d.createElement('script');
    s.src = 'https://bloggist-1.disqus.com/embed.js';
    s.setAttribute('data-timestamp', +new Date());
    (d.head || d.body).appendChild(s);
    })();
</script>
