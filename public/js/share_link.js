var d = new ClipboardJS('.link-copy',{
    text:function(a){
      return a.getAttribute('url-site')
     }
   });

d.on('success', function(a){
  a.trigger.setAttribute('data-bs-original-title','Copied!');
  a.trigger.setAttribute('data-bs-original-title','Copy Url');
  a.clearSelection()
});
