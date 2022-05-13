<?php
/**
 * Overrides a core block's render_callback method, if required.
 *
 * For the given blockname, if the overriding function is available
 * and the current callback is the gutenberg function
 * replace the render_callback with our own function.
 *
 * Note: For WordPress 5.9, as Gutenberg is no longer a pre-requisite to FSE themes,
 * this no longer checks that the implementing render callback function is prefixed with `gutenberg_`
 *
 * @param array $args Block attributes.
 * @param string $blockname The block name to test for.
 * @param string $render_callback The common suffix for the block's callback function.
 * @return array Block attributes.
 */
function sb_maybe_override_block($args, $blockname, $render_callback)
{
    $sb_render_callback = 'sb_' . $render_callback;
    if ($blockname == $args['name'] && function_exists($sb_render_callback)) {
        //if ('gutenberg_' . $render_callback == $args['render_callback']) {
            $args['render_callback'] = $sb_render_callback;

        //}
    }
    return $args;
}