/*-------
Add scripts in Admin Dashboard
--------*/

// Add classes in the frontend for Gutenberg blocks
const setExtraPropsToBlockType = (props, blockType, attributes) => {
    const notDefined = (typeof props.className === 'undefined' || !props.className) ? true : false

    if (blockType.name === 'core/paragraph') {
        return Object.assign(props, {
            className: notDefined ? 'g_paragraph' : `g_paragraph ${props.className}`,
        });
    }

    if (blockType.name === 'core/heading') {
        return Object.assign(props, {
            className: notDefined ? 'g_heading' : `g_heading ${props.className}`,
        });
    }

    if (blockType.name === 'core/image') {
        return Object.assign(props, {
            className: notDefined ? 'g_image' : `g_image ${props.className}`,
        });
    }

    if (blockType.name === 'core/quote') {
        return Object.assign(props, {
            className: notDefined ? 'g_quote' : `g_quote ${props.className}`,
        });
    }

    if (blockType.name === 'core/pullquote') {
        return Object.assign(props, {
            className: notDefined ? 'g_pullquote' : `g_pullquote ${props.className}`,
        });
    }

    if (blockType.name === 'core/freeform') {
        return Object.assign(props, {
            className: notDefined ? 'g_freeform' : `g_freeform ${props.className}`,
        });
    }

    if (blockType.name === 'core/html') {
        return Object.assign(props, {
            className: notDefined ? 'g_general' : `g_general ${props.className}`,
        });
    }

    

    return props;
};

wp.hooks.addFilter(
    'blocks.getSaveContent.extraProps',
    'block-filters',
    setExtraPropsToBlockType
);