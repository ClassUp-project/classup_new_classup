document.querySelectorAll('.link-copy').forEach(function(a){
    var b=new bootstrap.Tooltip(a);
    a.addEventListener('mouseleave', function(){
      b.hide()}
    )
     // console.log(a.getAttribute('url-site'));
  });

  var d = new ClipboardJS('.link-copy',{
    text:function(a){
      return a.getAttribute('url-site') 
     }
   });

d.on('success', function(a){
  var b = bootstrap.Tooltip.getInstance(a.trigger);
  a.trigger.setAttribute('data-bs-original-title','Copied!');
  b.show();
  a.trigger.setAttribute('data-bs-original-title','Copy Url');
  a.clearSelection()
});
