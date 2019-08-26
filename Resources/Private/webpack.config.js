var Encore = require('@symfony/webpack-encore');
const BrowserSyncPlugin = require('browser-sync-webpack-plugin');
const webpack = require('webpack');
const path = require('path');
const pkg = require('./package.json');
const banner = '' +
    ' Project:  ' + pkg.name + '\n' +
    ' Version:  ' + pkg.version + '\n' +
    ' \n' +
    ' Author:   ' + pkg.author.name + '\n' +
    ' Homepage: ' + pkg.homepage + '\n' +
    ' Copyright (c) ' + (new Date()).getFullYear() + ' ' + pkg.company + '\n' +
    ' \n' +
    ' Build:    ' + (new Date()) + '\n';

const resourcesPath = 'web/typo3conf/ext/ffpi_theme/Resources';
const privatePath = '';
const publicPath = '';

const privateRelativePath = './' + privatePath;
const publicRelativePath = './' + publicPath;
const publicAbsolutePath = '/' + publicPath;

Encore.configureFilenames({
  images: 'Images/[name].[hash:8].[ext]',
});
Encore.setOutputPath('../Public/Compiled/').
    setPublicPath('/typo3conf/ext/ffpi_theme/Resources/Public/Compiled').
    cleanupOutputBeforeBuild().
    enableBuildNotifications(true).
    enableSourceMaps(!Encore.isProduction())

    // will require an extra script tag for runtime.js
    // but, you probably want this, unless you're building a single-page app
    .enableSingleRuntimeChunk().

    addStyleEntry('Css/fonts', privateRelativePath + '/Sass/fonts.scss').
    addStyleEntry('Css/main', privateRelativePath + '/Sass/main.scss').

    enableSassLoader().
    enablePostCssLoader().
    configureBabel(function(babelConfig) {
    }).
    autoProvidejQuery().
    // addLoader({
    //   enforce: 'pre',
    //   test: /\.js$/,
    //   include: path.resolve(__dirname, privateRelativePath + '/Js'),
    //   exclude: /node_modules/,
    //   loader: 'eslint-loader',
    // }).
    disableFontsLoader() // Loader muss manuell angelegt werden, damit auch svg-Fonts geladen werden können.
    .addLoader({
      test: /\.(woff|woff2|ttf|eot|otf|svg)$/,
      include: [
        path.resolve(__dirname, privateRelativePath + '/Fonts'),
      ],
      loader: 'file-loader',
      options: {
        name: 'Fonts/[name].[ext]',
        publicPath: '../',
      },
    }).
    addPlugin(new webpack.BannerPlugin({banner: banner})).
    addPlugin(new BrowserSyncPlugin({
      host: 'localhost',
      port: 3000,
      proxy: 'http://localhost:8001/',
      serveStatic: ['.', publicRelativePath + '/Templates/Static/'],
      files: [
        publicPath + '/Css/*.css',
        publicPath + '/Css/**/*.css',
        publicPath + '/Js/*.js',
        publicPath + '/Js/**/*.js',
        privatePath + '/Templates/**/*.twig',
        privatePath + '/Templates/**/**/*.twig',
      ],
    }))
;

// export the final configuration
var config = Encore.getWebpackConfig();
config.node = {fs: 'empty'};

// Nötig, damit die Bilder nur aus dem Private/Images Verzeichnis genommen werden,
// da es soll eine Überschneitung bei SVGs (Bilder und Font) gibt.
const imagesRuleIndex = config.module.rules.findIndex(rule => {
  if ('options' in rule) {
    if (rule.options.name === 'Images/[name].[hash:8].[ext]') {
      return true;
    }
  }
  return false;
});

config.module.rules[imagesRuleIndex].include = [
  path.resolve(__dirname, privateRelativePath + '/Images'),
];

module.exports = config;
