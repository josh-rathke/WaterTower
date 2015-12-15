jQuery(document).foundation();

$(document).foundation({
"magellan-expedition": {
  destination_threshold: 50, // pixels from the top of destination for it to be considered active	
  offset_by_height: false // whether to offset the destination by the expedition height. Usually you want this to be true, unless your expedition is on the side.
}
});