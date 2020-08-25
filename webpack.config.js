const path = require('path');

module.exports = {
   entry: './assets/js/main.js',
   output: {
      filename: 'main.js',
      path: path.resolve(__dirname, 'assets/js/build'),
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