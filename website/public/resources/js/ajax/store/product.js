// Options
var options = {
    max_value: 5,
    step_size: 1,
    selected_symbol_type: 'utf8_star', // Must be a key from symbols
    cursor: 'default',
    readonly: false,
    change_once: false, // Determines if the rating can only be set once
}

$("#inputRating").rate(options);
