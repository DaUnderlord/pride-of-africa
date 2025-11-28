@if(config('services.tawkto.property_id') && config('services.tawkto.widget_id'))
<!-- Tawk.to Live Chat Widget -->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/{{ config('services.tawkto.property_id') }}/{{ config('services.tawkto.widget_id') }}';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();

// Customize Tawk.to appearance
Tawk_API.customStyle = {
    visibility: {
        desktop: {
            position: 'br', // bottom-right
            xOffset: 20,
            yOffset: 80 // Offset to not overlap with WhatsApp button
        },
        mobile: {
            position: 'br',
            xOffset: 10,
            yOffset: 80
        }
    }
};

// Set visitor info if available
Tawk_API.onLoad = function(){
    Tawk_API.setAttributes({
        'source': 'website',
        'page': window.location.pathname
    }, function(error){});
};
</script>
@endif
