var EmediateAdmin = new function(){

    this.addBreakpoint = function(){
        var parent = document.createElement('tr');

        // Min width
        var i = jQuery("#emediate_breakpoints table tbody").children().length;
        var min = document.createElement('input');
        min.type='text';
        min.name="emediate_options[breakpoints]["+i+"][min_width]";
        min.placeholder = "Min width";

        // Max width

        var max = document.createElement('input');
        max.type='text';
        max.name="emediate_options[breakpoints]["+i+"][max_width]";
        max.placeholder = "Max width";

        // Remove button

        var remove_button = document.createElement('input');
        remove_button.type='button';
        remove_button.className = "button-secondary";
        remove_button.onclick = function(){EmediateAdmin.remove(parent);};
        remove_button.value='Ta Bort';
        parent.appendChild(document.createElement('td').appendChild(min));
        parent.appendChild(document.createElement('td').appendChild(max));
        parent.appendChild(document.createElement('td').appendChild(remove_button));

        jQuery("#emediate_breakpoints table").append(parent);


    };

    this.addOptions = function(option, parent){

        var opt = document.createElement('option');
        opt.value = option;
        opt.innerHTML = option;
        parent.appendChild(opt);
    };

    this.remove = function(parent){
        if(confirm("Är du säker?"))jQuery(parent).remove();
    };
};
