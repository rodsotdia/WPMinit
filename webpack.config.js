const path = require('path');

module.exports = {
   entry: './js/scripts.js',
   output: {
      filename: 'main.js',
      path: path.resolve(__dirname, 'js/build'),
   },
   module: {
      rules: [
         {
         test: /\.css$/i,
         use: [
            {
               loader: 'style-loader', 
               options: { 
                  injectType: 'lazyStyleTag' 
               }
            }, 
            'css-loader'
         ],
         },
      ],
   },
};