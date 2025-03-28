const tabbedContent = () => {
    (function() {
        // Super cheap selector engine
        var $ = function(selector, context) {
            return [].slice.call( (context || document).querySelectorAll(selector) )
        }
    
        $('.responsive-tabs').forEach(function(tabs) {
            // Store active tab
            var active = $('dt', tabs)[0]
    
            // Click handler
            tabs.addEventListener('click', function(e) {
                if ( e.target.nodeName.toLowerCase() === 'dt' ) {
                    active.classList.remove('active')
    
                    e.target.classList.add('active')    
                    active = e.target
                }
            })
        })
    }())
}

export default tabbedContent