// Add Class to Allow Buttons to Activate Chat Window
$('.activate-zopim').click(function(e){
    e.preventDefault();
    
    $zopim(function() {
       $zopim.livechat.window.show();
    });
});

$('.close-chat-badge').click(function(){
   $('.chat-badge').css('display', 'none' ); 
});