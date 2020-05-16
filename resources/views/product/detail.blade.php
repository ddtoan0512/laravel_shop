@extends('layouts.app')
@section('content')

<style>
  .fotorama__arr:focus:after,
  .fotorama__fullscreen-icon:focus:after,
  .fotorama__html,
  .fotorama__img,
  .fotorama__nav__frame:focus .fotorama__dot:after,
  .fotorama__nav__frame:focus .fotorama__thumb:after,
  .fotorama__stage__frame,
  .fotorama__stage__shaft,
  .fotorama__video iframe {
    position: absolute;
    width: 100%;
    height: 100%;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0
  }

  .fotorama--fullscreen,
  .fotorama__img {
    max-width: 99999px !important;
    max-height: 99999px !important;
    min-width: 0 !important;
    min-height: 0 !important;
    border-radius: 0 !important;
    box-shadow: none !important;
    padding: 0 !important
  }

  .fotorama__wrap .fotorama__grab {
    cursor: move;
    cursor: -webkit-grab;
    cursor: -o-grab;
    cursor: -ms-grab;
    cursor: grab
  }

  .fotorama__grabbing * {
    cursor: move;
    cursor: -webkit-grabbing;
    cursor: -o-grabbing;
    cursor: -ms-grabbing;
    cursor: grabbing
  }

  .fotorama__spinner {
    position: absolute !important;
    top: 50% !important;
    left: 50% !important
  }

  .fotorama__wrap--css3 .fotorama__arr,
  .fotorama__wrap--css3 .fotorama__fullscreen-icon,
  .fotorama__wrap--css3 .fotorama__nav__shaft,
  .fotorama__wrap--css3 .fotorama__stage__shaft,
  .fotorama__wrap--css3 .fotorama__thumb-border,
  .fotorama__wrap--css3 .fotorama__video-close,
  .fotorama__wrap--css3 .fotorama__video-play {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0)
  }

  .fotorama__caption,
  .fotorama__nav:after,
  .fotorama__nav:before,
  .fotorama__stage:after,
  .fotorama__stage:before,
  .fotorama__wrap--css3 .fotorama__html,
  .fotorama__wrap--css3 .fotorama__nav,
  .fotorama__wrap--css3 .fotorama__spinner,
  .fotorama__wrap--css3 .fotorama__stage,
  .fotorama__wrap--css3 .fotorama__stage .fotorama__img,
  .fotorama__wrap--css3 .fotorama__stage__frame {
    -webkit-transform: translateZ(0);
    transform: translateZ(0)
  }

  .fotorama__arr:focus,
  .fotorama__fullscreen-icon:focus,
  .fotorama__nav__frame {
    outline: 0
  }

  .fotorama__arr:focus:after,
  .fotorama__fullscreen-icon:focus:after,
  .fotorama__nav__frame:focus .fotorama__dot:after,
  .fotorama__nav__frame:focus .fotorama__thumb:after {
    content: '';
    border-radius: inherit;
    background-color: rgba(0, 175, 234, .5)
  }

  .fotorama__wrap--video .fotorama__stage,
  .fotorama__wrap--video .fotorama__stage__frame--video,
  .fotorama__wrap--video .fotorama__stage__frame--video .fotorama__html,
  .fotorama__wrap--video .fotorama__stage__frame--video .fotorama__img,
  .fotorama__wrap--video .fotorama__stage__shaft {
    -webkit-transform: none !important;
    transform: none !important
  }

  .fotorama__wrap--css3 .fotorama__nav__shaft,
  .fotorama__wrap--css3 .fotorama__stage__shaft,
  .fotorama__wrap--css3 .fotorama__thumb-border {
    transition-property: -webkit-transform, width;
    transition-property: transform, width;
    transition-timing-function: cubic-bezier(.1, 0, .25, 1);
    transition-duration: 0ms
  }

  .fotorama__arr,
  .fotorama__fullscreen-icon,
  .fotorama__no-select,
  .fotorama__video-close,
  .fotorama__video-play,
  .fotorama__wrap {
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none
  }

  .fotorama__select {
    -webkit-user-select: text;
    -moz-user-select: text;
    -ms-user-select: text;
    user-select: text
  }

  .fotorama__nav,
  .fotorama__nav__frame {
    margin: auto;
    padding: 0
  }

  .fotorama__caption__wrap,
  .fotorama__nav__frame,
  .fotorama__nav__shaft {
    -moz-box-orient: vertical;
    display: inline-block;
    vertical-align: middle;
    *display: inline;
    *zoom: 1
  }

  .fotorama__nav__frame,
  .fotorama__thumb-border {
    box-sizing: content-box
  }

  .fotorama__caption__wrap {
    box-sizing: border-box
  }

  .fotorama--hidden,
  .fotorama__load {
    position: absolute;
    left: -99999px;
    top: -99999px;
    z-index: -1
  }

  .fotorama__arr,
  .fotorama__fullscreen-icon,
  .fotorama__nav,
  .fotorama__nav__frame,
  .fotorama__nav__shaft,
  .fotorama__stage__frame,
  .fotorama__stage__shaft,
  .fotorama__video-close,
  .fotorama__video-play {
    -webkit-tap-highlight-color: transparent
  }

  .fotorama__arr,
  .fotorama__fullscreen-icon,
  .fotorama__video-close,
  .fotorama__video-play {
    background: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/fotorama/fotorama.png) no-repeat
  }

  @media(-webkit-min-device-pixel-ratio:1.5),
  (min-resolution:2dppx) {

    .fotorama__arr,
    .fotorama__fullscreen-icon,
    .fotorama__video-close,
    .fotorama__video-play {
      background: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/fotorama/fotorama@2x.png) 0 0/96px 160px no-repeat
    }
  }

  .fotorama__thumb {
    background-color: #7f7f7f;
    background-color: rgba(127, 127, 127, .2)
  }

  @media print {

    .fotorama__arr,
    .fotorama__fullscreen-icon,
    .fotorama__thumb-border,
    .fotorama__video-close,
    .fotorama__video-play {
      background: none !important
    }
  }

  .fotorama {
    min-width: 1px;
    overflow: hidden
  }

  .fotorama:not(.fotorama--unobtrusive)>*:not(:first-child) {
    display: none
  }

  .fullscreen {
    width: 100% !important;
    height: 100% !important;
    max-width: 100% !important;
    max-height: 100% !important;
    margin: 0 !important;
    padding: 0 !important;
    overflow: hidden !important;
    background: #000
  }

  .fotorama--fullscreen {
    position: absolute !important;
    top: 0 !important;
    left: 0 !important;
    right: 0 !important;
    bottom: 0 !important;
    float: none !important;
    z-index: 99999 !important;
    background: #000;
    width: 100% !important;
    height: 100% !important;
    margin: 0 !important
  }

  .fotorama--fullscreen .fotorama__nav,
  .fotorama--fullscreen .fotorama__stage {
    background: #000
  }

  .fotorama__wrap {
    -webkit-text-size-adjust: 100%;
    position: relative;
    direction: ltr;
    z-index: 0
  }

  .fotorama__wrap--rtl .fotorama__stage__frame {
    direction: rtl
  }

  .fotorama__nav,
  .fotorama__stage {
    overflow: hidden;
    position: relative;
    max-width: 100%
  }

  .fotorama__wrap--pan-y {
    -ms-touch-action: pan-y
  }

  .fotorama__wrap .fotorama__pointer {
    cursor: pointer
  }

  .fotorama__wrap--slide .fotorama__stage__frame {
    opacity: 1 !important
  }

  .fotorama__stage__frame {
    overflow: hidden
  }

  .fotorama__stage__frame.fotorama__active {
    z-index: 8
  }

  .fotorama__wrap--fade .fotorama__stage__frame {
    display: none
  }

  .fotorama__wrap--fade .fotorama__fade-front,
  .fotorama__wrap--fade .fotorama__fade-rear,
  .fotorama__wrap--fade .fotorama__stage__frame.fotorama__active {
    display: block;
    left: 0;
    top: 0
  }

  .fotorama__wrap--fade .fotorama__fade-front {
    z-index: 8
  }

  .fotorama__wrap--fade .fotorama__fade-rear {
    z-index: 7
  }

  .fotorama__wrap--fade .fotorama__fade-rear.fotorama__active {
    z-index: 9
  }

  .fotorama__wrap--fade .fotorama__stage .fotorama__shadow {
    display: none
  }

  .fotorama__img {
    -ms-filter: "alpha(Opacity=0)";
    filter: alpha(opacity=0);
    opacity: 0;
    border: none !important
  }

  .fotorama__error .fotorama__img,
  .fotorama__loaded .fotorama__img {
    -ms-filter: "alpha(Opacity=100)";
    filter: alpha(opacity=100);
    opacity: 1
  }

  .fotorama--fullscreen .fotorama__loaded--full .fotorama__img,
  .fotorama__img--full {
    display: none
  }

  .fotorama--fullscreen .fotorama__loaded--full .fotorama__img--full {
    display: block
  }

  .fotorama__wrap--only-active .fotorama__nav,
  .fotorama__wrap--only-active .fotorama__stage {
    max-width: 99999px !important
  }

  .fotorama__wrap--only-active .fotorama__stage__frame {
    visibility: hidden
  }

  .fotorama__wrap--only-active .fotorama__stage__frame.fotorama__active {
    visibility: visible
  }

  .fotorama__nav {
    font-size: 0;
    line-height: 0;
    text-align: center;
    display: none;
    white-space: nowrap;
    z-index: 5
  }

  .fotorama__nav__shaft {
    position: relative;
    left: 0;
    top: 0;
    text-align: left
  }

  .fotorama__nav__frame {
    position: relative;
    cursor: pointer
  }

  .fotorama__nav--dots {
    display: block
  }

  .fotorama__nav--dots .fotorama__nav__frame {
    width: 18px;
    height: 30px
  }

  .fotorama__nav--dots .fotorama__nav__frame--thumb,
  .fotorama__nav--dots .fotorama__thumb-border {
    display: none
  }

  .fotorama__nav--thumbs {
    display: block
  }

  .fotorama__nav--thumbs .fotorama__nav__frame {
    padding-left: 0 !important
  }

  .fotorama__nav--thumbs .fotorama__nav__frame:last-child {
    padding-right: 0 !important
  }

  .fotorama__nav--thumbs .fotorama__nav__frame--dot {
    display: none
  }

  .fotorama__dot {
    display: block;
    width: 4px;
    height: 4px;
    position: relative;
    top: 12px;
    left: 6px;
    border-radius: 6px;
    border: 1px solid #7f7f7f
  }

  .fotorama__nav__frame:focus .fotorama__dot:after {
    padding: 1px;
    top: -1px;
    left: -1px
  }

  .fotorama__nav__frame.fotorama__active .fotorama__dot {
    width: 0;
    height: 0;
    border-width: 3px
  }

  .fotorama__nav__frame.fotorama__active .fotorama__dot:after {
    padding: 3px;
    top: -3px;
    left: -3px
  }

  .fotorama__thumb {
    overflow: hidden;
    position: relative;
    width: 100%;
    height: 100%
  }

  .fotorama__nav__frame:focus .fotorama__thumb {
    z-index: 2
  }

  .fotorama__thumb-border {
    position: absolute;
    z-index: 9;
    top: 0;
    left: 0;
    border-style: solid;
    border-color: #00afea;
    background-image: linear-gradient(to bottom right, rgba(255, 255, 255, .25), rgba(64, 64, 64, .1))
  }

  .fotorama__caption {
    position: absolute;
    z-index: 12;
    bottom: 0;
    left: 0;
    right: 0;
    font-family: 'Helvetica Neue', Arial, sans-serif;
    font-size: 14px;
    line-height: 1.5;
    color: #fff;
    text-align: center;
    background: rgba(0, 0, 0, .75)
  }

  .fotorama__caption a {
    text-decoration: none;
    color: #000;
    border-bottom: 1px solid;
    border-color: rgba(0, 0, 0, .5)
  }

  .fotorama__caption a:hover {
    color: #333;
    border-color: rgba(51, 51, 51, .5)
  }

  .fotorama__wrap--rtl .fotorama__caption {
    left: auto;
    right: 0
  }

  .fotorama__wrap--no-captions .fotorama__caption,
  .fotorama__wrap--video .fotorama__caption {
    display: none
  }

  .fotorama__caption__wrap {
    padding: 5px 10px
  }

  @-webkit-keyframes spinner {
    0% {
      -webkit-transform: rotate(0);
      transform: rotate(0)
    }

    100% {
      -webkit-transform: rotate(360deg);
      transform: rotate(360deg)
    }
  }

  @keyframes spinner {
    0% {
      -webkit-transform: rotate(0);
      transform: rotate(0)
    }

    100% {
      -webkit-transform: rotate(360deg);
      transform: rotate(360deg)
    }
  }

  .fotorama__wrap--css3 .fotorama__spinner {
    -webkit-animation: spinner 24s infinite linear;
    animation: spinner 24s infinite linear
  }

  .fotorama__wrap--css3 .fotorama__html,
  .fotorama__wrap--css3 .fotorama__stage .fotorama__img {
    transition-property: opacity;
    transition-timing-function: linear;
    transition-duration: .3s
  }

  .fotorama__wrap--video .fotorama__stage__frame--video .fotorama__html,
  .fotorama__wrap--video .fotorama__stage__frame--video .fotorama__img {
    -ms-filter: "alpha(Opacity=0)";
    filter: alpha(opacity=0);
    opacity: 0
  }

  .fotorama__select {
    cursor: auto
  }

  .fotorama__video {
    top: 32px;
    right: 0;
    bottom: 0;
    left: 0;
    position: absolute;
    z-index: 10
  }

  @-moz-document url-prefix() {
    .fotorama__active;

      {
      box-shadow: 0 0 0 transparent;
    }
  }

  .fotorama__arr,
  .fotorama__fullscreen-icon,
  .fotorama__video-close,
  .fotorama__video-play {
    position: absolute;
    z-index: 11;
    cursor: pointer
  }

  .fotorama__arr {
    position: absolute;
    width: 32px;
    height: 32px;
    top: 50%;
    margin-top: -16px
  }

  .fotorama__arr--prev {
    left: 2px;
    background-position: 0 0
  }

  .fotorama__arr--next {
    right: 2px;
    background-position: -32px 0
  }

  .fotorama__arr--disabled {
    pointer-events: none;
    cursor: default;
    *display: none;
    opacity: .1
  }

  .fotorama__fullscreen-icon {
    width: 32px;
    height: 32px;
    top: 2px;
    right: 2px;
    background-position: 0 -32px;
    z-index: 20
  }

  .fotorama__arr:focus,
  .fotorama__fullscreen-icon:focus {
    border-radius: 50%
  }

  .fotorama--fullscreen .fotorama__fullscreen-icon {
    background-position: -32px -32px
  }

  .fotorama__video-play {
    width: 96px;
    height: 96px;
    left: 50%;
    top: 50%;
    margin-left: -48px;
    margin-top: -48px;
    background-position: 0 -64px;
    opacity: 0
  }

  .fotorama__wrap--css2 .fotorama__video-play,
  .fotorama__wrap--video .fotorama__stage .fotorama__video-play {
    display: none
  }

  .fotorama__error .fotorama__video-play,
  .fotorama__loaded .fotorama__video-play,
  .fotorama__nav__frame .fotorama__video-play {
    opacity: 1;
    display: block
  }

  .fotorama__nav__frame .fotorama__video-play {
    width: 32px;
    height: 32px;
    margin-left: -16px;
    margin-top: -16px;
    background-position: -64px -32px
  }

  .fotorama__video-close {
    width: 32px;
    height: 32px;
    top: 0;
    right: 0;
    background-position: -64px 0;
    z-index: 20;
    opacity: 0
  }

  .fotorama__wrap--css2 .fotorama__video-close {
    display: none
  }

  .fotorama__wrap--css3 .fotorama__video-close {
    -webkit-transform: translate3d(32px, -32px, 0);
    transform: translate3d(32px, -32px, 0)
  }

  .fotorama__wrap--video .fotorama__video-close {
    display: block;
    opacity: 1
  }

  .fotorama__wrap--css3.fotorama__wrap--video .fotorama__video-close {
    -webkit-transform: translate3d(0, 0, 0);
    transform: translate3d(0, 0, 0)
  }

  .fotorama__wrap--no-controls.fotorama__wrap--toggle-arrows .fotorama__arr,
  .fotorama__wrap--no-controls.fotorama__wrap--toggle-arrows .fotorama__fullscreen-icon {
    opacity: 0
  }

  .fotorama__wrap--no-controls.fotorama__wrap--toggle-arrows .fotorama__arr:focus,
  .fotorama__wrap--no-controls.fotorama__wrap--toggle-arrows .fotorama__fullscreen-icon:focus {
    opacity: 1
  }

  .fotorama__wrap--video .fotorama__arr,
  .fotorama__wrap--video .fotorama__fullscreen-icon {
    opacity: 0 !important
  }

  .fotorama__wrap--css2.fotorama__wrap--no-controls.fotorama__wrap--toggle-arrows .fotorama__arr,
  .fotorama__wrap--css2.fotorama__wrap--no-controls.fotorama__wrap--toggle-arrows .fotorama__fullscreen-icon {
    display: none
  }

  .fotorama__wrap--css2.fotorama__wrap--no-controls.fotorama__wrap--toggle-arrows .fotorama__arr:focus,
  .fotorama__wrap--css2.fotorama__wrap--no-controls.fotorama__wrap--toggle-arrows .fotorama__fullscreen-icon:focus {
    display: block
  }

  .fotorama__wrap--css2.fotorama__wrap--video .fotorama__arr,
  .fotorama__wrap--css2.fotorama__wrap--video .fotorama__fullscreen-icon {
    display: none !important
  }

  .fotorama__wrap--css3.fotorama__wrap--no-controls.fotorama__wrap--slide.fotorama__wrap--toggle-arrows .fotorama__fullscreen-icon:not(:focus) {
    -webkit-transform: translate3d(32px, -32px, 0);
    transform: translate3d(32px, -32px, 0)
  }

  .fotorama__wrap--css3.fotorama__wrap--no-controls.fotorama__wrap--slide.fotorama__wrap--toggle-arrows .fotorama__arr--prev:not(:focus) {
    -webkit-transform: translate3d(-48px, 0, 0);
    transform: translate3d(-48px, 0, 0)
  }

  .fotorama__wrap--css3.fotorama__wrap--no-controls.fotorama__wrap--slide.fotorama__wrap--toggle-arrows .fotorama__arr--next:not(:focus) {
    -webkit-transform: translate3d(48px, 0, 0);
    transform: translate3d(48px, 0, 0)
  }

  .fotorama__wrap--css3.fotorama__wrap--video .fotorama__fullscreen-icon {
    -webkit-transform: translate3d(32px, -32px, 0) !important;
    transform: translate3d(32px, -32px, 0) !important
  }

  .fotorama__wrap--css3.fotorama__wrap--video .fotorama__arr--prev {
    -webkit-transform: translate3d(-48px, 0, 0) !important;
    transform: translate3d(-48px, 0, 0) !important
  }

  .fotorama__wrap--css3.fotorama__wrap--video .fotorama__arr--next {
    -webkit-transform: translate3d(48px, 0, 0) !important;
    transform: translate3d(48px, 0, 0) !important
  }

  .fotorama__wrap--css3 .fotorama__arr:not(:focus),
  .fotorama__wrap--css3 .fotorama__fullscreen-icon:not(:focus),
  .fotorama__wrap--css3 .fotorama__video-close:not(:focus),
  .fotorama__wrap--css3 .fotorama__video-play:not(:focus) {
    transition-property: -webkit-transform, opacity;
    transition-property: transform, opacity;
    transition-duration: .3s
  }

  .fotorama__nav:after,
  .fotorama__nav:before,
  .fotorama__stage:after,
  .fotorama__stage:before {
    content: "";
    display: block;
    position: absolute;
    text-decoration: none;
    top: 0;
    bottom: 0;
    width: 10px;
    height: auto;
    z-index: 10;
    pointer-events: none;
    background-repeat: no-repeat;
    background-size: 1px 100%, 5px 100%
  }

  .fotorama__nav:before,
  .fotorama__stage:before {
    background-image: linear-gradient(transparent, rgba(0, 0, 0, .2) 25%, rgba(0, 0, 0, .3) 75%, transparent), radial-gradient(farthest-side at 0 50%, rgba(0, 0, 0, .4), transparent);
    background-position: 0 0, 0 0;
    left: -10px
  }

  .fotorama__nav.fotorama__shadows--left:before,
  .fotorama__stage.fotorama__shadows--left:before {
    left: 0
  }

  .fotorama__nav:after,
  .fotorama__stage:after {
    background-image: linear-gradient(transparent, rgba(0, 0, 0, .2) 25%, rgba(0, 0, 0, .3) 75%, transparent), radial-gradient(farthest-side at 100% 50%, rgba(0, 0, 0, .4), transparent);
    background-position: 100% 0, 100% 0;
    right: -10px
  }

  .fotorama__nav.fotorama__shadows--right:after,
  .fotorama__stage.fotorama__shadows--right:after {
    right: 0
  }

  .fotorama--fullscreen .fotorama__nav:after,
  .fotorama--fullscreen .fotorama__nav:before,
  .fotorama--fullscreen .fotorama__stage:after,
  .fotorama--fullscreen .fotorama__stage:before,
  .fotorama__wrap--fade .fotorama__stage:after,
  .fotorama__wrap--fade .fotorama__stage:before,
  .fotorama__wrap--no-shadows .fotorama__nav:after,
  .fotorama__wrap--no-shadows .fotorama__nav:before,
  .fotorama__wrap--no-shadows .fotorama__stage:after,
  .fotorama__wrap--no-shadows .fotorama__stage:before {
    display: none
  }

  /* 01:50:24 11/02/2020 */
  .twentytwenty-horizontal .twentytwenty-handle:before,
  .twentytwenty-horizontal .twentytwenty-handle:after,
  .twentytwenty-vertical .twentytwenty-handle:before,
  .twentytwenty-vertical .twentytwenty-handle:after {
    content: " ";
    display: block;
    background: #fff;
    position: absolute;
    z-index: 30;
    -webkit-box-shadow: 0 0 12px rgba(51, 51, 51, .5);
    -moz-box-shadow: 0 0 12px rgba(51, 51, 51, .5);
    box-shadow: 0 0 12px rgba(51, 51, 51, .5)
  }

  .twentytwenty-horizontal .twentytwenty-handle:before,
  .twentytwenty-horizontal .twentytwenty-handle:after {
    width: 3px;
    height: 9999px;
    left: 50%;
    margin-left: -1.5px
  }

  .twentytwenty-vertical .twentytwenty-handle:before,
  .twentytwenty-vertical .twentytwenty-handle:after {
    width: 9999px;
    height: 3px;
    top: 50%;
    margin-top: -1.5px
  }

  .twentytwenty-before-label,
  .twentytwenty-after-label,
  .twentytwenty-overlay {
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%
  }

  .twentytwenty-before-label,
  .twentytwenty-after-label,
  .twentytwenty-overlay {
    -webkit-transition-duration: .5s;
    -moz-transition-duration: .5s;
    transition-duration: .5s
  }

  .twentytwenty-before-label,
  .twentytwenty-after-label {
    -webkit-transition-property: opacity;
    -moz-transition-property: opacity;
    transition-property: opacity
  }

  .twentytwenty-before-label:before,
  .twentytwenty-after-label:before {
    color: #fff;
    font-size: 13px;
    letter-spacing: .1em
  }

  .twentytwenty-before-label:before,
  .twentytwenty-after-label:before {
    position: absolute;
    background: rgba(255, 255, 255, .2);
    line-height: 38px;
    padding: 0 20px;
    -webkit-border-radius: 2px;
    -moz-border-radius: 2px;
    border-radius: 2px
  }

  .twentytwenty-horizontal .twentytwenty-before-label:before,
  .twentytwenty-horizontal .twentytwenty-after-label:before {
    top: 50%;
    margin-top: -19px
  }

  .twentytwenty-vertical .twentytwenty-before-label:before,
  .twentytwenty-vertical .twentytwenty-after-label:before {
    left: 50%;
    margin-left: -45px;
    text-align: center;
    width: 90px
  }

  .twentytwenty-left-arrow,
  .twentytwenty-right-arrow,
  .twentytwenty-up-arrow,
  .twentytwenty-down-arrow {
    width: 0;
    height: 0;
    border: 6px inset transparent;
    position: absolute
  }

  .twentytwenty-left-arrow,
  .twentytwenty-right-arrow {
    top: 50%;
    margin-top: -6px
  }

  .twentytwenty-up-arrow,
  .twentytwenty-down-arrow {
    left: 50%;
    margin-left: -6px
  }

  .twentytwenty-container {
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box;
    z-index: 0;
    overflow: hidden;
    position: relative;
    -webkit-user-select: none;
    -moz-user-select: none
  }

  .twentytwenty-container img {
    max-width: 100%;
    position: absolute;
    top: 0;
    display: block
  }

  .twentytwenty-container.active .twentytwenty-overlay,
  .twentytwenty-container.active :hover.twentytwenty-overlay {
    background: rgba(0, 0, 0, 0)
  }

  .twentytwenty-container.active .twentytwenty-overlay .twentytwenty-before-label,
  .twentytwenty-container.active .twentytwenty-overlay .twentytwenty-after-label,
  .twentytwenty-container.active :hover.twentytwenty-overlay .twentytwenty-before-label,
  .twentytwenty-container.active :hover.twentytwenty-overlay .twentytwenty-after-label {
    opacity: 0
  }

  .twentytwenty-container * {
    -webkit-box-sizing: content-box;
    -moz-box-sizing: content-box;
    box-sizing: content-box
  }

  .twentytwenty-before-label {
    opacity: 0
  }

  .twentytwenty-before-label:before {
    content: "Before"
  }

  .twentytwenty-after-label {
    opacity: 0
  }

  .twentytwenty-after-label:before {
    content: "After"
  }

  .twentytwenty-horizontal .twentytwenty-before-label:before {
    left: 10px
  }

  .twentytwenty-horizontal .twentytwenty-after-label:before {
    right: 10px
  }

  .twentytwenty-vertical .twentytwenty-before-label:before {
    top: 10px
  }

  .twentytwenty-vertical .twentytwenty-after-label:before {
    bottom: 10px
  }

  .twentytwenty-overlay {
    -webkit-transition-property: background;
    -moz-transition-property: background;
    transition-property: background;
    background: rgba(0, 0, 0, 0);
    z-index: 25
  }

  .twentytwenty-overlay:hover {
    background: rgba(0, 0, 0, .5)
  }

  .twentytwenty-overlay:hover .twentytwenty-after-label {
    opacity: 1
  }

  .twentytwenty-overlay:hover .twentytwenty-before-label {
    opacity: 1
  }

  .twentytwenty-before {
    z-index: 20
  }

  .twentytwenty-after {
    z-index: 10
  }

  .twentytwenty-handle {
    height: 38px;
    width: 38px;
    position: absolute;
    left: 50%;
    top: 50%;
    margin-left: -22px;
    margin-top: -22px;
    border: 3px solid #fff;
    -webkit-border-radius: 1000px;
    -moz-border-radius: 1000px;
    border-radius: 1000px;
    -webkit-box-shadow: 0 0 12px rgba(51, 51, 51, .5);
    -moz-box-shadow: 0 0 12px rgba(51, 51, 51, .5);
    box-shadow: 0 0 12px rgba(51, 51, 51, .5);
    z-index: 40;
    cursor: pointer
  }

  .twentytwenty-horizontal .twentytwenty-handle:before {
    bottom: 50%;
    margin-bottom: 22px;
    -webkit-box-shadow: 0 3px 0 white, 0 0 12px rgba(51, 51, 51, .5);
    -moz-box-shadow: 0 3px 0 white, 0 0 12px rgba(51, 51, 51, .5);
    box-shadow: 0 3px 0 white, 0 0 12px rgba(51, 51, 51, .5)
  }

  .twentytwenty-horizontal .twentytwenty-handle:after {
    top: 50%;
    margin-top: 22px;
    -webkit-box-shadow: 0 -3px 0 white, 0 0 12px rgba(51, 51, 51, .5);
    -moz-box-shadow: 0 -3px 0 white, 0 0 12px rgba(51, 51, 51, .5);
    box-shadow: 0 -3px 0 white, 0 0 12px rgba(51, 51, 51, .5)
  }

  .twentytwenty-vertical .twentytwenty-handle:before {
    left: 50%;
    margin-left: 22px;
    -webkit-box-shadow: 3px 0 0 white, 0 0 12px rgba(51, 51, 51, .5);
    -moz-box-shadow: 3px 0 0 white, 0 0 12px rgba(51, 51, 51, .5);
    box-shadow: 3px 0 0 white, 0 0 12px rgba(51, 51, 51, .5)
  }

  .twentytwenty-vertical .twentytwenty-handle:after {
    right: 50%;
    margin-right: 22px;
    -webkit-box-shadow: -3px 0 0 white, 0 0 12px rgba(51, 51, 51, .5);
    -moz-box-shadow: -3px 0 0 white, 0 0 12px rgba(51, 51, 51, .5);
    box-shadow: -3px 0 0 white, 0 0 12px rgba(51, 51, 51, .5)
  }

  .twentytwenty-left-arrow {
    border-right: 6px solid #fff;
    left: 50%;
    margin-left: -17px
  }

  .twentytwenty-right-arrow {
    border-left: 6px solid #fff;
    right: 50%;
    margin-right: -17px
  }

  .twentytwenty-up-arrow {
    border-bottom: 6px solid #fff;
    top: 50%;
    margin-top: -17px
  }

  .twentytwenty-down-arrow {
    border-top: 6px solid #fff;
    bottom: 50%;
    margin-bottom: -17px
  }

  /* 11:19:39 15/05/2020 */
  * {
    margin: 0;
    padding: 0
  }

  body {
    min-width: 1024px;
    overflow-x: hidden
  }

  img {
    border: 0
  }

  a {
    text-decoration: none
  }

  ul,
  ol {
    list-style: none
  }

  .clr {
    clear: both
  }

  p {
    -webkit-margin-before: 0;
    -webkit-margin-after: 0;
    -webkit-margin-start: 0;
    -webkit-margin-end: 0;
    text-rendering: geometricPrecision
  }

  input[type=text],
  input[type=tel],
  textarea {
    -webkit-appearance: none
  }

  body,
  input,
  button,
  option,
  textarea,
  label,
  legend,
  h1,
  h2,
  h3,
  h4,
  h5,
  h6,
  h1 a,
  h2 a,
  h3 a,
  h4 a,
  h5 a,
  h6 a {
    font: 14px/18px Helvetica, Arial, 'DejaVu Sans', 'Liberation Sans', Freesans, sans-serif;
    color: #333;
    outline: none;
    zoom: 1
  }

  header {
    position: absolute;
    top: 0;
    min-width: 1024px;
    background: #fed700;
    width: 100%;
    height: 55px;
    z-index: 3
  }

  section {
    max-width: 1200px;
    width: 100%;
    min-width: 980px;
    margin: 55px auto 0;
    position: relative
  }

  footer {
    width: 100%;
    min-width: 1024px;
    margin: 0 auto;
    background: #fff;
    overflow: hidden;
    clear: both
  }

  .wrap-main {
    max-width: 1200px;
    min-width: 1024px;
    width: 100%;
    height: 55px;
    background: #000;
    margin: auto;
    position: relative;
    display: block
  }

  .logo {
    float: left;
    width: 165px;
    display: block;
    padding: 14px 0 11px 5px
  }

  .logo a {
    display: block;
    overflow: hidden
  }

  #search-site {
    float: left;
    width: 230px;
    height: 35px;
    margin: 10px 10px 0 10px;
    background: #fff;
    position: relative;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px
  }

  .topinput {
    float: left;
    width: 162px;
    margin-left: 8px;
    padding-top: 3px;
    border: 0;
    position: relative;
    background: #fff;
    height: 30px;
    text-indent: 10px;
    font-size: 13px
  }

  .btntop {
    float: right;
    width: 40px;
    height: 35px;
    border: 0;
    background: none
  }

  nav {
    width: 780px;
    background: #fed700;
    margin: 0;
    padding: 0;
    display: table;
    *display: block;
    *float: none
  }

  nav a {
    display: table-cell;
    *float: left;
    width: 75px;
    height: 44px;
    padding: 3px 0 4px;
    color: #000;
    background: #fed700;
    font-size: 11px;
    text-align: center;
    text-transform: uppercase;
    position: relative
  }

  nav a:hover,
  nav a.actmenu {
    background-color: #f5f5f5
  }

  nav a.mobile {
    width: 80px
  }

  nav a.tablet {
    width: 80px
  }

  nav a.laptop {
    width: 74px
  }

  nav a.phukien {
    width: 70px
  }

  nav a.simcard {
    width: 60px
  }

  nav a.ask {
    width: 70px
  }

  nav a.maydoitra {
    width: 80px
  }

  nav a.gameapp {
    width: 80px;
    height: 43px
  }

  nav a span {
    display: block;
    position: absolute;
    top: 9px;
    width: 23px;
    margin: auto;
    left: 0;
    right: 0;
    font-size: 11px
  }

  nav a.cardsim,
  nav a.utility {
    text-transform: none;
    font-size: 13px;
    padding: 0;
    vertical-align: middle;
    line-height: 19px;
    padding-top: 6px
  }

  nav a.utility {
    width: 100px
  }

  [class^="icontgdd-"],
  [class*="icontgdd-"],
  [class^="iconmobile-"],
  [class*="iconmobile-"] {
    background-image: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/V4/icondesktop2022@1x_edit.png?v=004);
    background-repeat: no-repeat;
    display: inline-block;
    height: 30px;
    width: 30px;
    line-height: 30px;
    vertical-align: middle
  }

  @media all and (-webkit-min-device-pixel-ratio:1.5) {

    [class^="icontgdd-"],
    [class*="icontgdd-"],
    [class^="iconmobile-"],
    [class*="iconmobile-"] {
      background-image: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/V4/icondesktop2022@2x_edit.png?v=003);
      background-size: 500px 100px
    }
  }

  .icontgdd-logo {
    background-position: 0 0;
    width: 156px;
    height: 30px;
    display: block;
    margin: auto
  }

  .icontgdd-topsearch {
    background-position: -160px 0;
    width: 20px;
    height: 20px;
    display: block;
    margin: 1px auto 0
  }

  .icontgdd-mobile {
    background-position: -190px 0;
    width: 16px;
    height: 25px;
    display: block;
    margin: 2px auto 3px
  }

  .icontgdd-tablet {
    background-position: -209px 0;
    display: block;
    margin: 0 auto 5px;
    width: 33px;
    height: 22px
  }

  .icontgdd-laptop {
    background-position: -245px 0;
    display: block;
    margin: 0 auto 5px;
    width: 39px;
    height: 21px
  }

  .icontgdd-phukien {
    background-position: -288px 0;
    display: block;
    margin: 0 auto 5px;
    width: 22px;
    height: 22px
  }

  .icontgdd-maydoitra {
    background-position: -315px 0;
    display: block;
    margin: 0 auto 4px;
    width: 34px;
    height: 26px
  }

  .icontgdd-simcard {
    background-position: -355px 0;
    display: block;
    margin: 0 auto 5px;
    width: 18px;
    height: 23px
  }

  .icontgdd-news {
    display: block;
    margin: 0 auto 2px;
    background-position: -428px -50px;
    width: 28px;
    height: 25px
  }

  .icontgdd-ask {
    background-position: -410px 0;
    display: block;
    margin: 0 auto 3px;
    width: 25px;
    height: 25px
  }

  .icontgdd-gameapp {
    background-position: -462px -52px;
    display: block;
    margin: 0 auto 5px;
    height: 20px;
    width: 32px
  }

  .icontgdd-promo {
    background-position: -475px 0;
    display: block;
    margin: 0 auto 3px;
    width: 22px;
    height: 24px
  }

  .icontgdd-watch {
    background-position: -362px -50px;
    display: block;
    margin: 0 auto 0;
    width: 16px;
    height: 27px
  }

  .rowfoot1 {
    display: block;
    overflow: hidden;
    width: 100%;
    min-width: 1024px;
    max-width: 1200px;
    margin: 0 auto;
    padding: 15px 0
  }

  .colfoot {
    float: left;
    width: 28%;
    margin: 0;
    position: relative
  }

  .collast {
    width: 11%;
    float: right
  }

  .colfoot li {
    float: none;
    position: relative;
    font-size: 13px;
    color: #444
  }

  .colfoot li a {
    display: block;
    color: #288ad6;
    font-size: 14px;
    line-height: 25px;
    padding-top: 5px
  }

  .colfoot li a:hover {
    color: #666
  }

  .colfoot li a.bct,
  .colfoot li a.dmca-badge {
    display: inline-block
  }

  .colfoot li p {
    display: block;
    padding-top: 5px;
    line-height: 25px;
    font-size: 14px;
    color: #666
  }

  .colfoot li p a {
    display: inline;
    font-weight: 600;
    color: #333;
    padding: 0 5px
  }

  .colfoot li.showmore {
    font-weight: bold
  }

  .colfoot li.showmore a:after {
    content: '';
    display: inline-block;
    width: 0;
    height: 0;
    border-top: 5px solid #288ad6;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    margin: 0 0 0 5px;
    position: relative;
    top: -2px
  }

  .colfoot li.showmore a:hover:after {
    border-top: 5px solid #666
  }

  .colfoot li.hidden {
    display: none
  }

  .colfoot li a.linkfb {
    float: left;
    padding: 0 10px 0 0;
    margin: 9px 0 2px;
    border-right: 1px solid #e9e9e9;
    font-size: 12px;
    line-height: 1;
    color: #288ad6
  }

  .colfoot li a.linkyt {
    float: left;
    padding: 0 0 0 10px;
    margin: 9px 0 2px;
    font-size: 12px;
    color: #288ad6;
    line-height: 1
  }

  .colfoot li a.dmx {
    display: block;
    overflow: hidden;
    clear: both;
    padding: 5px 0
  }

  .rowfoot2 {
    width: 100%;
    min-width: 980px;
    overflow: hidden;
    background: #f8f8f8;
    padding: 10px 0
  }

  .rowfoot2 p {
    display: block;
    width: 100%;
    margin: auto;
    font-size: 10px;
    color: #999;
    text-align: center
  }

  .rowfoot2 a {
    color: #999
  }

  .icontgdd-share1 {
    background-position: 0 -30px;
    width: 13px;
    height: 13px;
    margin-right: 3px
  }

  .icontgdd-share3 {
    background-position: -16px -30px;
    width: 17px;
    height: 13px;
    margin-right: 3px
  }

  .icontgdd-dmx {
    background-position: -36px -30px;
    width: 100px;
    height: 19px
  }

  .icontgdd-bct {
    background-position: 0 -50px;
    width: 110px;
    height: 38px
  }

  .icontgdd-hg {
    background-position: -384px -49px;
    width: 45px;
    height: 38px
  }

  .stickcart {
    position: fixed;
    right: 70px;
    bottom: 42px;
    background: #fff;
    border-radius: 40px;
    box-shadow: 0 0 10px 0 rgba(0, 0, 0, .15);
    font-size: 14px;
    color: #288ad6;
    padding: 0 10px 0 0;
    width: 130px;
    z-index: 99
  }

  .stickcart div {
    float: left;
    width: 38px;
    height: 38px;
    border-radius: 40px;
    background: #ffde31;
    margin: 2px 5px 2px 2px
  }

  .stickcart span {
    display: block;
    padding: 4px 0 0;
    white-space: nowrap
  }

  .stickcart strong {
    display: block;
    white-space: nowrap
  }

  .icontgdd-cartstick {
    background-position: -265px -30px;
    width: 22px;
    height: 18px;
    display: block;
    margin: 11px 0 0 6px
  }

  [class^="iconlogo-"],
  [class*="iconlogo-"] {
    background-image: url(/Content/desktop/images/V4/logosprite@1x.png?v=3);
    background-repeat: no-repeat;
    display: inline-block;
    height: 30px;
    width: 30px;
    line-height: 30px;
    vertical-align: middle
  }

  @media(-webkit-min-device-pixel-ratio:1.5) {

    [class^="iconlogo-"],
    [class*="iconlogo-"] {
      background-image: url(/Content/desktop/images/V4/logosprite@2x.png?v=3);
      background-size: 517px 20px
    }
  }

  .iconlogo-bhx {
    background-position: -220px 0;
    width: 90px;
    height: 19px
  }

  .iconlogo-dmx {
    background-position: -109px 0;
    width: 111px;
    height: 19px
  }

  .iconlogo-ma {
    background-position: -313px 0;
    width: 100px;
    height: 19px
  }

  .iconlogo-ta {
    background-position: -409px 0;
    width: 100px;
    height: 19px
  }

  .group {
    display: block;
    overflow: hidden;
    clear: both
  }

  .group label {
    display: block;
    font-size: 12px;
    color: #888;
    margin-top: 10px
  }

  .group a {
    display: block;
    vertical-align: top;
    padding-top: 0 !important
  }

  .breadcrumb {
    display: block;
    overflow: hidden;
    margin: 0;
    background: #fff;
    line-height: 32px;
    padding-top: 5px
  }

  .breadcrumb li {
    display: inline-block;
    vertical-align: middle;
    overflow: hidden
  }

  .breadcrumb li a {
    display: inline-block;
    white-space: nowrap;
    font-size: 14px;
    color: #288ad6;
    padding: 0 10px 0 0
  }

  .breadcrumb li a span {
    font-size: 14px;
    padding: 0;
    color: #288ad6
  }

  .breadcrumb span {
    display: inline-block;
    font-size: 20px;
    color: #999;
    padding: 2px 5px 0 0;
    line-height: 1
  }

  .breadcrumb li h1,
  .breadcrumb li h2 {
    display: inline-block;
    font-size: 14px;
    color: #288ad6;
    font-weight: normal;
    line-height: 32px
  }

  .breadcrumb li h1 a {
    color: #288ad6
  }

  .breadcrumb li h2 a {
    padding-left: 2px;
    color: #288ad6
  }

  #back-top {
    display: none;
    z-index: 99
  }

  #back-top span:before {
    cursor: pointer;
    background: #fdd504;
    width: 40px;
    position: fixed;
    right: 20px;
    bottom: 45px;
    height: 40px;
    text-align: center;
    line-height: 40px;
    font-size: 18px;
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -o-transition: all .2s linear;
    -transition: all .2s linear;
    color: #000;
    content: "▲";
    opacity: .7;
    z-index: 8;
    border-radius: 5px
  }

  #back-top span:hover:before {
    opacity: 1
  }

  #dlding,
  #imgtrack,
  .none {
    display: none
  }

  .wrap-suggestion {
    display: block;
    border: 1px solid #e2e2e2;
    background: #fff;
    position: absolute;
    left: 0;
    width: 345px;
    top: 45px;
    z-index: 9
  }

  .wrap-suggestion:after,
  .wrap-suggestion:before {
    bottom: 100%;
    left: 80px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute
  }

  .wrap-suggestion:after {
    border-color: rgba(255, 255, 255, 0);
    border-bottom-color: #fff;
    border-width: 8px;
    margin-left: -8px
  }

  .wrap-suggestion:before {
    border-color: rgba(218, 218, 218, 0);
    border-bottom-color: #dadada;
    border-width: 9px;
    margin-left: -9px
  }

  .wrap-suggestion li {
    display: block;
    background: #fff;
    overflow: hidden;
    list-style: none;
    border-bottom: 1px dotted #ccc
  }

  .wrap-suggestion li.link {
    border: none;
    padding-left: 10px;
    padding-right: 10px
  }

  .wrap-suggestion li.link:first-child {
    margin-top: 6px
  }

  .wrap-suggestion li.link.last {
    margin-bottom: 6px
  }

  .wrap-suggestion li.link a {
    font-size: 14px;
    color: #3b7adb
  }

  .wrap-suggestion li.text {
    background-color: #f5f5f5;
    color: #666;
    font-size: 13px;
    border: none;
    padding: 7px 10px
  }

  .wrap-suggestion li:last-child {
    border-bottom: 0
  }

  .wrap-suggestion li:hover,
  .wrapp-producthome .wrap-suggestion li.selected,
  .wrap-main .wrap-suggestion li.selected {
    background: #f8f8f8
  }

  .wrap-suggestion li a {
    display: block;
    overflow: hidden;
    padding: 6px;
    color: #333;
    font-size: 12px
  }

  .wrap-suggestion li a img {
    float: left;
    width: 50px;
    height: auto;
    margin: 0 6px 0 0
  }

  .wrap-suggestion li a h3 {
    display: block;
    width: auto;
    color: #333;
    font-size: 14px;
    font-weight: 700;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap
  }

  .wrap-suggestion li a h6 {
    font-size: 12px;
    color: #e67e22
  }

  .wrap-suggestion li a span {
    float: left;
    font-size: 13px;
    color: #333
  }

  .wrap-suggestion li a cite {
    font-size: 12px
  }

  .wrap-suggestion li a span.price {
    font-size: 12px;
    color: #c70100;
    float: none
  }

  .wrap-suggestion li a label {
    display: block;
    font-size: 12px;
    color: #999;
    padding-left: 56px
  }

  .wrap-suggestion li a label strong {
    font-size: 12px;
    color: #d0021b
  }

  .wrap-suggestion li.samsung img {
    display: inline-block;
    vertical-align: middle;
    width: 80px
  }

  .wrap-suggestion li.samsung b {
    display: inline-block;
    vertical-align: middle;
    color: #333
  }

  .wrap-suggestion li a .cheappriceonline {
    color: #e67e22;
    font-size: 12px
  }

  .wrap-suggestion li a .cheappriceonline cite {
    color: #333
  }

  .wrap-suggestion li a .promo img {
    display: none
  }

  .wrap_rts {
    overflow: hidden;
    position: fixed;
    z-index: 11;
    bottom: 0;
    right: 10%
  }

  .wrap_rts .pop {
    display: block;
    overflow: hidden;
    position: relative;
    width: 100%;
    max-width: 400px;
    margin: auto;
    background: #fff;
    margin-top: 20%;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    border: solid 1px #ccc
  }

  .wrap_rts .pop .hdpop {
    padding: 10px 0 10px 10px;
    border-bottom: solid 1px #ccc;
    font-size: 15px;
    background: #f89406;
    color: #fff
  }

  .wrap_rts .pop .hdpop .closehd {
    float: right;
    color: #fff;
    border: solid 1px #fff;
    height: 25px;
    width: 25px;
    border-radius: 50%;
    position: absolute;
    top: 5px;
    right: 10px;
    font-size: 13px;
    text-align: center;
    cursor: pointer;
    font-style: normal;
    box-sizing: border-box;
    padding-top: 3px
  }

  .wrap_rts .pop .if {
    display: block;
    padding: 10px 10px 0
  }

  .wrap_rts .pop .if .price {
    color: #d0021b
  }

  .wrap_rts .pop .ivt {
    display: block;
    padding: 10px 10px 0;
    text-align: center
  }

  .wrap_rts .pop ul.ol {
    padding: 10px;
    border-bottom: 1px solid #ddd
  }

  .wrap_rts .pop ul.ol li .iprn {
    color: #288ad6
  }

  .wrap_rts .pop ul.ol li .iprn:before {
    content: '•';
    display: inline-block;
    vertical-align: middle;
    font-size: 20px;
    color: #999;
    margin-right: 5px
  }

  .wrap_rts .pop ul.ol li .iprp {
    color: #d0021b;
    float: right
  }

  .wrap_rts .pop ul.rtt {
    padding: 10px;
    overflow: hidden
  }

  .wrap_rts .pop ul.rtt li {
    text-align: center;
    float: left;
    width: 33%;
    color: #288ad6;
    cursor: pointer
  }

  .wrap_rts .pop ul.rtt li img {
    display: block;
    width: 40px;
    height: 40px;
    margin: 0 auto 10px
  }

  .wrap_rts .pop .chsRtUstf {
    border-radius: 5px;
    border: solid 1px #ccc;
    overflow: hidden;
    margin: 10px;
    padding: 10px
  }

  .wrap_rts .pop .chsRtUstf span {
    display: block;
    text-align: center;
    margin: 0 0 10px
  }

  .wrap_rts .pop .chsRtUstf a.chbUt {
    display: block;
    width: 50%;
    float: left;
    color: #288ad6;
    padding: 10px 0
  }

  .wrap_rts .pop .chsRtUstf a.chbUt i {
    margin: 0 8px
  }

  .wrap_rts .pop .chsRtUstf a.chbUt span {
    display: inline
  }

  .wrap_rts .pop .chsRtUstf a.btnRsUs {
    padding: 8px;
    background: #288ad6;
    color: #fff;
    border-radius: 5px;
    text-align: -webkit-center;
    width: 75px;
    margin: 10px auto 0;
    display: -webkit-box
  }

  .wrap_rts .pop .msg {
    margin: 10px 0 20px
  }

  .wrap_rts .pop .btnRs {
    padding: 8px;
    background: #fff;
    color: #288ad6;
    border: solid 1px #288ad6;
    border-radius: 5px;
    text-align: -webkit-center;
    width: 75px;
    margin: 10px auto 0;
    display: -webkit-box
  }

  .wrap_rts .iconmobile-uncheckbox {
    background-position: -145px -30px;
    width: 16px;
    height: 16px;
    vertical-align: sub
  }

  .wrap_rts .iconmobile-checkbox {
    background-position: -165px -30px;
    width: 16px;
    height: 16px;
    vertical-align: sub
  }

  .hide {
    display: none !important
  }

  @media screen and (max-width:1220px) {
    .wrap-main {
      width: 1024px
    }

    .logo {
      width: 35px
    }

    .logo a img {
      display: none
    }

    .icontgdd-logo {
      width: 28px
    }

    #search-site {
      width: 200px
    }

    .topinput {
      width: 152px
    }

    nav {
      width: 764px
    }

    nav a {
      font-size: 11px
    }

    .colfoot li a {
      padding: 0 0 0 5px;
      line-height: 30px
    }

    .colfoot {
      width: 26.5%
    }

    .collast {
      width: 13%
    }

    .colfoot li a.bct {
      padding: 0
    }

    .breadcrumb {
      margin: 0 10px
    }
  }

  #search-site .wrap-suggestion-b2b {
    display: none
  }

  .wrap-suggestion li a h6.textOLOL {
    color: #d0021b
  }

  .mix-menu {
    position: absolute;
    right: 0;
    display: none;
    width: 100%;
    margin-top: 3px
  }

  .mix-menu a {
    display: block;
    width: 100%;
    height: 44px;
    padding: 6px 0 4px;
    color: #000;
    background: #fed700;
    font-size: 13px;
    text-align: center;
    position: relative;
    border-top: 1px solid rgba(0, 0, 0, .1);
    text-transform: none
  }

  .mix-menu a.cardsim {
    line-height: 44px
  }

  .mix-menu a:hover {
    border-top: 1px solid rgba(0, 0, 0, .1);
    background-color: #eee
  }

  #utility-cardsim {
    width: 100px;
    height: 36px;
    padding: 15px 5px 4px;
    color: #000;
    background: #fed700;
    background-color: #fed700;
    font-size: 13px;
    text-align: center;
    display: inline-block;
    border-left: 1px solid rgba(0, 0, 0, .1);
    position: relative
  }

  #utility-cardsim:hover .mix-menu {
    display: block
  }

  #utility-cardsim:hover #utility-cardsim {
    background-color: #fed700
  }

  #utility-cardsim:hover {
    background-color: #f5f5f5
  }

  /* 01:50:03 11/02/2020 */
  .owl-carousel .owl-wrapper:after {
    content: ".";
    display: block;
    clear: both;
    visibility: hidden;
    line-height: 0;
    height: 0
  }

  .owl-carousel {
    display: none;
    position: relative;
    width: 100%;
    -ms-touch-action: pan-y
  }

  .owl-carousel .owl-wrapper {
    display: none;
    position: relative;
    -webkit-transform: translate3d(0, 0, 0)
  }

  .owl-carousel .owl-wrapper-outer {
    overflow: hidden;
    position: relative;
    width: 100%
  }

  .owl-carousel .owl-wrapper-outer.autoHeight {
    -webkit-transition: height 500ms ease-in-out;
    -moz-transition: height 500ms ease-in-out;
    -ms-transition: height 500ms ease-in-out;
    -o-transition: height 500ms ease-in-out;
    transition: height 500ms ease-in-out
  }

  .owl-carousel .owl-item {
    float: left
  }

  .owl-controls .owl-page,
  .owl-controls .owl-buttons div {
    cursor: pointer
  }

  .owl-controls {
    -webkit-user-select: none;
    -khtml-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0)
  }

  .owl-carousel .owl-wrapper,
  .owl-carousel .owl-item {
    -webkit-backface-visibility: hidden;
    -moz-backface-visibility: hidden;
    -ms-backface-visibility: hidden;
    -webkit-transform: translate3d(0, 0, 0);
    -moz-transform: translate3d(0, 0, 0);
    -ms-transform: translate3d(0, 0, 0)
  }

  .owl-theme .owl-controls {
    margin-top: 0;
    text-align: center
  }

  .owl-theme .owl-controls .owl-buttons div {
    display: inline-block;
    zoom: 1;
    *display: inline
  }

  .owl-theme .owl-controls.clickable .owl-buttons div:hover {
    text-decoration: none
  }

  .owl-theme .owl-controls .owl-page {
    display: inline-block;
    zoom: 1;
    *display: inline
  }

  .owl-theme .owl-controls .owl-page span {
    display: block;
    width: 4px;
    height: 4px;
    margin: 0 5px;
    -webkit-border-radius: 20px;
    -moz-border-radius: 20px;
    border-radius: 20px;
    background: #d8d8d8
  }

  .owl-theme .owl-controls .owl-page.active span,
  .owl-theme .owl-controls.clickable .owl-page:hover span {
    background: #ef8a32
  }

  .owl-theme .owl-controls .owl-page span.owl-numbers {
    height: auto;
    width: auto;
    color: #fff;
    padding: 2px 10px;
    font-size: 12px;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px
  }

  /* 11:48:04 29/04/2020 */
  .fullparameter {
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    z-index: 99;
    display: none;
    padding: 0 0 0 55px;
    width: 630px;
    margin: 0 auto
  }

  .fullparameter.display {
    display: block
  }

  .fullparameter ul {
    padding: 10px 30px 10px 30px;
    width: 450px
  }

  .fullparameter .scroll {
    height: 100vh;
    width: auto;
    padding: 0 30px 0 30px;
    overflow-x: hidden;
    overflow-y: auto;
    background: #fff
  }

  .fullparameter .scroll img {
    display: block;
    margin: 0 auto;
    width: 500px;
    height: auto
  }

  .fullparameter .scroll h4,
  .fullparameter .scroll h3 {
    display: block;
    font-size: 18px;
    color: #666;
    font-weight: 600;
    margin-top: 15px;
    line-height: 1.3em
  }

  .tableparameter .closebtn {
    position: fixed;
    top: 0;
    right: 0;
    z-index: 99
  }

  .fullparameter .closebtn {
    float: right;
    width: 75px;
    height: 75px;
    position: absolute;
    top: 0;
    right: 0;
    cursor: pointer
  }

  .fullparameter .scroll .viewarticle {
    float: left;
    padding: 8px;
    width: 200px;
    border: 1px solid #288ad6;
    border-radius: 4px;
    font-size: 13px;
    color: #288ad6;
    font-weight: 600;
    margin: 15px 0 0 30px;
    text-align: center
  }

  .fullparameter .scroll .viewarticle:hover {
    background: #288ad6;
    color: #fff
  }

  .fullparameter .scroll .closetable {
    float: left;
    padding: 8px;
    margin: 16px;
    font-size: 13px;
    color: #288ad6;
    position: relative;
    width: auto;
    height: auto
  }

  .fullparameter .scroll .closetable:hover {
    color: #e67e22
  }

  .fullparameter .scroll::-webkit-scrollbar {
    width: 9px
  }

  .fullparameter .scroll::-webkit-scrollbar-track {
    background: #fff;
    width: 11px;
    padding: 2px
  }

  .fullparameter .scroll::-webkit-scrollbar-thumb {
    background: #d8d8d8;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px
  }

  .parameterfull {
    display: block;
    position: relative;
    overflow: hidden;
    background: #fff
  }

  .parameterfull li {
    display: table;
    *display: block;
    background: #fff;
    width: 100%;
    border-bottom: 1px solid #dadada
  }

  .parameterfull li label {
    display: block;
    background: #f2f2f2;
    font-size: 16px;
    font-weight: 600;
    color: #c0392b;
    padding: 8px
  }

  .parameterfull li span {
    display: table-cell;
    *float: left;
    width: 35%;
    vertical-align: top;
    padding: 6px 5px;
    font-size: 13px;
    color: #666;
    font-weight: 600
  }

  .parameterfull li span div.ph {
    padding: 0
  }

  .parameterfull li div {
    display: table-cell;
    *float: left;
    width: auto;
    vertical-align: top;
    padding: 6px 5px;
    font-size: 13px;
    color: #666
  }

  .parameterfull li div a {
    color: #288ad6
  }

  .parameterfull li div a:hover {
    color: #e67e22
  }

  .specWear {
    padding: 0 !important;
    margin-top: 15px;
    width: 100% !important
  }

  .fixbody {
    overflow: hidden;
    left: 0;
    right: 0
  }

  .fixparameter {
    display: block;
    overflow: hidden;
    background: rgba(0, 0, 0, .75);
    position: fixed;
    left: 0;
    right: 0;
    bottom: 0;
    top: 0;
    z-index: 99;
    text-indent: 999999em
  }

  .icondetail-closepara {
    background-image: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/icondetail@1x.png);
    background-position: -160px -60px;
    width: 75px;
    height: 75px;
    cursor: pointer;
    display: block
  }

  .parameterfull li span a {
    color: #288ad6
  }

  .parameterfull li span a div {
    color: #288ad6
  }

  /* http://www.thegioididong.com/commentnew/content/css/comment-desktop.min.css */
  [class^="iconcom-"],
  [class*="iconcom-"] {
    background-image: url(//s.tgdd.vn/comment/Content/images/commentmobile@2x.png);
    background-size: 270px 128px;
    background-repeat: no-repeat;
    display: inline-block;
    height: 30px;
    width: 30px;
    line-height: 30px;
    vertical-align: middle
  }

  .wrap_comment [class^="i1-"],
  .wrap_comment [class*="i1-"] {
    display: inline !important;
    width: auto !important
  }

  .wrap_comment [class^="i2-"],
  .wrap_comment [class*="i2-"] {
    display: inline !important;
    width: auto !important
  }

  .wrap_comment {
    display: block;
    overflow: hidden;
    position: relative;
    width: 96%;
    max-width: 800px;
    padding: 10px 2%
  }

  .wrap_comment .edtCmt {
    border-radius: 4px;
    border: 1px solid #dadada
  }

  .wrap_comment .edtCmt textarea {
    width: 100%;
    border: none;
    border-bottom: 1px solid #dadada;
    border-radius: 4px 4px 0 0;
    padding: 10px;
    box-sizing: border-box;
    line-height: 20px
  }

  .wrap_comment .totalcomment {
    float: left;
    padding: 12px 0 10px;
    font-size: 16px;
    color: #333;
    overflow: hidden;
    font-weight: bold;
    text-transform: capitalize
  }

  .wrap_comment .s_comment {
    float: right;
    padding: 10px 0;
    font-size: 16px;
    color: #666;
    overflow: hidden;
    position: relative
  }

  .wrap_comment .s_comment b {
    float: right;
    margin: 8px 0 8px 8px;
    width: 0;
    height: 0;
    border-top: 5px solid #999;
    border-right: 5px solid transparent;
    border-left: 5px solid transparent
  }

  .wrap_comment .s_comment input {
    float: left;
    position: relative;
    padding: 10px 8px 10px 35px;
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    font-size: 14px;
    color: #999;
    width: 240px;
    height: 35px
  }

  .wrap_comment .s_comment i {
    position: absolute;
    top: 20px;
    left: 10px;
    width: 20px;
    height: 20px
  }

  .wrap_comment .fts_comment {
    display: block;
    float: left;
    padding: 15px 0 0;
    font-size: 14px;
    color: #333;
    overflow: hidden;
    width: 100%
  }

  .wrap_comment .fts_comment .c_lbl {
    margin-right: 15px
  }

  .wrap_comment .fts_comment .c_ods {
    display: inline-block;
    cursor: pointer;
    margin-right: 10px
  }

  .wrap_comment .fts_comment span i {
    padding-bottom: 5px;
    margin-right: 3px
  }

  .wrap_comment .arrowup b {
    -webkit-transform: rotate(-180deg);
    -moz-transform: rotate(-180deg);
    -ms-transform: rotate(-180deg);
    -o-transform: rotate(-180deg);
    filter: progid:DXImageTransform.Microsoft.BasicImage(rotation=3)
  }

  .wrap_comment .iconcom-search {
    background-position: 0 0;
    width: 16px;
    height: 16px;
    vertical-align: baseline
  }

  .wrap_comment .iconcom-radcheck {
    background-position: -20px 0;
    width: 16px;
    height: 16px
  }

  .wrap_comment .iconcom-avactv {
    background-position: -1px -79px;
    width: 23px;
    height: 23px
  }

  .wrap_comment .iconcom-raduncheck {
    background-position: -40px 0;
    width: 16px;
    height: 16px
  }

  .wrap_comment .iconcom-zalo {
    background-position: 0 -47px;
    width: 23px;
    height: 23px
  }

  .wrap_comment .iconcom-success {
    background-position: -25px -45px;
    width: 27px;
    height: 27px;
    display: block;
    margin: 10px auto
  }

  .wrap_comment .wrap_seasort {
    display: none;
    overflow: visible;
    position: absolute;
    top: 50px;
    left: 6px;
    right: 6px;
    z-index: 10;
    background: #f1f1f1;
    border-radius: 2px;
    padding: 10px
  }

  .wrap_comment .wrap_seasort:before {
    content: ' ';
    position: absolute;
    bottom: 100%;
    right: 7%;
    width: 0;
    height: 0;
    border-bottom: 10px solid #f1f1f1;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent
  }

  .wrap_comment .wrap_seasort form {
    display: block;
    overflow: hidden;
    margin: 10px 0
  }

  .wrap_comment .wrap_seasort input {
    float: left;
    padding: 10px;
    width: 70%;
    border: 1px solid #dadada;
    height: 20px;
    border-radius: 4px;
    font-size: 14px;
    color: #9b9b9b
  }

  .wrap_comment .wrap_seasort button {
    float: right;
    padding: 10px 0;
    width: 20%;
    text-align: center;
    height: 42px;
    border: 1px solid #337fd8;
    border-radius: 4px;
    background: #4a90e2;
    font-size: 14px;
    color: #fff;
    text-transform: uppercase
  }

  .wrap_comment .wrap_seasort span {
    display: block;
    overflow: hidden;
    margin-bottom: 5px;
    font-size: 14px;
    color: #333
  }

  .wrap_comment .wrap_seasort div {
    display: block;
    overflow: hidden
  }

  .wrap_comment .wrap_seasort div a {
    display: inline-block;
    padding: 5px 0;
    margin-right: 10px;
    font-size: 14px;
    color: #333
  }

  .wrap_comment .iconcom-opt {
    background-position: -40px 0;
    width: 16px;
    height: 16px;
    vertical-align: sub
  }

  .wrap_comment .wrap_seasort div a.choosed .iconcom-opt {
    background-position: -20px 0
  }

  .wrap_comment .txtEditor,
  .wrap_comment .textarea {
    display: block;
    overflow: hidden;
    width: 96.5%;
    background: #fff;
    min-height: 100px !important;
    border: 1px solid #dadada;
    border-radius: 4px;
    padding: 10px 1.5%;
    font-size: 14px;
    color: #333;
    outline: none
  }

  .wrap_comment .boxemotion {
    overflow: visible;
    position: relative
  }

  .wrap_comment .motionsend {
    display: block;
    overflow: hidden;
    padding: 5px
  }

  .wrap_comment .cmt_right {
    float: right
  }

  .wrap_comment .motionsend a {
    padding: 0 12px 0 5px;
    height: 20px;
    color: #4a90e2;
    font-size: 14px;
    border-right: 1px solid #dadada;
    display: inline-block;
    line-height: 20px
  }

  .wrap_comment .motionsend button,
  .wrap_comment .motionsend a.btnSend {
    padding: 5px 25px;
    height: 20px;
    font-size: 14px;
    color: #fff;
    text-transform: uppercase;
    border: 1px solid #288ad6;
    border-radius: 4px;
    background: #288ad6;
    margin: 0
  }

  .wrap_comment .motionsend .qd {
    border: none;
    color: #4a90e2;
    padding-top: 6px;
    box-sizing: border-box;
    height: 30px;
    display: inline-block
  }

  .wrap_comment .motionsend .loading {
    color: #333;
    float: right;
    margin: 3px 10px 0 0
  }

  .wrap_comment .form_reply .motionsend .loading {
    margin: 5px
  }

  .wrap_comment .iconcom-pict {
    background-position: -80px -25px;
    width: 18px;
    height: 16px;
    margin: 5px
  }

  .wrap_comment .iconcom-emot {
    background-position: -100px -25px;
    width: 16px;
    height: 16px;
    display: block;
    margin: 7px auto
  }

  .wrap_comment .chooseemot,
  .choosepic {
    background: #4a90e2
  }

  .wrap_comment .choosepic .iconcom-pict {
    background-position: -135px -55px
  }

  .wrap_comment .chooseemot .iconcom-emot {
    background-position: -155px -46px
  }

  .wrap_comment .wrap_emotion {
    overflow: hidden;
    border: 1px solid #dadada;
    border-radius: 4px;
    background: #fff;
    margin: 10px 0;
    position: relative;
    left: 0;
    right: 0;
    z-index: 0
  }

  .wrap_comment .form_reply .wrap_emotion {
    position: relative;
    top: 0
  }

  .wrap_comment .closeemotion {
    position: absolute;
    top: 1px;
    right: 1px;
    padding: 10px;
    font-size: 12px;
    color: #666
  }

  .wrap_comment .wrap_emotion ul {
    display: block;
    overflow: hidden;
    border-bottom: 1px solid #dadada;
    height: 40px
  }

  .wrap_comment .wrap_emotion li {
    float: left;
    overflow: hidden
  }

  .wrap_comment .wrap_emotion li:first-child {
    margin-left: 5px
  }

  .wrap_comment .wrap_emotion li a {
    display: block;
    padding: 0 10px;
    height: 40px
  }

  .wrap_comment .wrap_emotion li a.active {
    background: #efefef
  }

  .wrap_comment .iconcom-emotmbw {
    background-position: -120px -20px;
    width: 17px;
    height: 24px;
    margin: 8px 0
  }

  .wrap_comment .iconcom-emotyho {
    background-position: -140px -20px;
    width: 24px;
    height: 24px;
    margin: 8px 0
  }

  .wrap_comment .iconcom-emotthr {
    background-position: -165px -25px;
    width: 20px;
    height: 20px;
    margin: 10px 0
  }

  .wrap_comment .listemotion {
    background: #fff;
    padding: 10px
  }

  .wrap_comment #content_2,
  .wrap_comment #content_3 {
    display: none
  }

  .wrap_comment .boxviews {
    display: block;
    overflow: hidden;
    position: relative;
    margin: 10px 0;
    padding: 10px;
    border: 1px solid #fbd600;
    border-radius: 4px;
    background: #fffde3;
    font-size: 14px;
    color: #666
  }

  .wrap_comment .boxviews a {
    color: #4a90e2
  }

  .wrap_comment .boxviews b {
    color: #333
  }

  .wrap_comment .iconcom-heart {
    background-position: -190px 0;
    width: 75px;
    height: 72px;
    position: absolute;
    top: 2px;
    right: 5px
  }

  .wrap_comment .boxfilter {
    display: block;
    overflow: hidden;
    position: relative;
    margin: 10px 0;
    padding: 10px;
    border: 1px solid #fbd600;
    border-radius: 4px;
    background: #fffde3;
    font-size: 14px;
    color: #333
  }

  .wrap_comment .boxfilter a {
    color: #4a90e2
  }

  .wrap_comment .boxfilter b {
    color: #333
  }

  .wrap_comment .iconcom-combg {
    background-position: -50px -55px;
    width: 65px;
    height: 54px;
    position: absolute;
    top: 2px;
    right: 5px
  }

  .wrap_comment .boxreport {
    display: block;
    overflow: hidden;
    position: relative;
    margin: 10px 0;
    padding: 10px;
    border: 2px solid #f79232;
    border-radius: 4px;
    background: #fff;
    font-size: 14px;
    color: #333
  }

  .wrap_comment .boxreport a {
    color: #4a90e2
  }

  .wrap_comment .boxreport b {
    color: #333
  }

  .wrap_comment .statistical .notifyChat img {
    float: left;
    width: 45px;
    height: 45px;
    display: inline-block
  }

  .wrap_comment .statistical .notifyChat .ctNotify {
    margin-left: 10px;
    display: inline-block
  }

  .wrap_comment .statistical .notifyChat .ctNotify p {
    margin-bottom: 10px
  }

  .wrap_comment .notifyChat .seeCmt {
    margin-left: 10px;
    padding: 8px 12px !important
  }

  .wrap_comment .notifyChat .btnRqChat {
    padding: 5px 15px !important;
    height: 20px;
    font-size: 14px;
    color: #fff !important;
    border: 1px solid #d97f00;
    border-radius: 4px;
    background: #f89406;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#f76b1c), to(#f89406));
    background: -webkit-linear-gradient(top, #f89406, #f76b1c);
    background: -moz-linear-gradient(top, #f89406, #f76b1c);
    background: -ms-linear-gradient(top, #f89406, #f76b1c);
    background: -o-linear-gradient(top, #f89406, #f76b1c);
    margin: 0;
    float: left
  }

  .wrap_comment .fixedChat {
    position: fixed;
    bottom: 0;
    right: 70px;
    z-index: 2
  }

  .wrap_comment .boxnotifi {
    display: block;
    overflow: hidden;
    position: relative;
    margin: 10px 0;
    padding: 10px 10px 10px 35px;
    border: 2px solid #4a90e2;
    border-radius: 4px;
    background: #fff;
    font-size: 14px;
    color: #333
  }

  .wrap_comment .iconcom-send {
    background-position: 0 -25px;
    width: 31px;
    height: 13px;
    float: left;
    margin: 4px 10px 15px -28px
  }

  .wrap_comment .listcomment {
    display: block;
    overflow: visible;
    background: #fff;
    margin: 20px 0;
    border-top: 1px solid #dadada;
    padding-top: 20px
  }

  .wrap_comment .listcomment li {
    display: block;
    overflow: visible;
    margin-bottom: 15px;
    position: relative;
    padding-bottom: 5px
  }

  .wrap_comment .listcomment li.special {
    background: #fffbea;
    border-top: 1px dashed #edd468;
    border-bottom: 1px dashed #edd468;
    padding: 10px 10px 5px;
    margin: 0 -10px 10px
  }

  .wrap_comment .listcomment li .inputreply {
    display: block;
    overflow: hidden;
    margin: 10px 0 0 0
  }

  .wrap_comment .listcomment .imgCmt {
    cursor: pointer
  }

  .wrap_comment .rowuser {
    float: left;
    overflow: visible
  }

  .wrap_comment .rowuser a {
    float: left;
    overflow: visible;
    font-size: 16px;
    color: #333;
    position: relative;
    cursor: default
  }

  .wrap_comment .rowuser a strong {
    float: left;
    overflow: hidden;
    line-height: 22px;
    margin-top: 2px;
    text-transform: capitalize
  }

  .wrap_comment .rowuser a img {
    float: left;
    width: 24px;
    height: 24px;
    margin-right: 10px
  }

  .wrap_comment .rowuser a div {
    float: left;
    width: 25px;
    height: 25px;
    background: #ddd;
    margin-right: 7px;
    text-align: center;
    color: #666;
    text-transform: uppercase;
    font-size: 12px;
    line-height: 26px;
    font-weight: 600;
    text-shadow: 1px 1px 0 rgba(255, 255, 255, .2)
  }

  .wrap_comment .rowuser a div.c {
    background: none
  }

  .wrap_comment .rowuser label {
    float: left;
    font-size: 14px;
    color: #888;
    line-height: 20px;
    padding-top: 2px
  }

  .wrap_comment .iconcom-adm {
    background-position: -120px -55px;
    width: 12px;
    height: 12px;
    position: absolute;
    top: 15px;
    left: 15px
  }

  .wrap_comment .iconcom-checkbuy {
    background-position: -60px 0;
    width: 12px;
    height: 12px;
    margin: -2px 0 0 10px
  }

  .wrap_comment .contentconfirm {
    display: none;
    overflow: visible;
    border: 1px solid #ccc;
    border-radius: 3px;
    padding: 10px;
    position: absolute;
    top: 18px;
    left: 8px;
    right: 8px;
    z-index: 10;
    box-shadow: 0 10px 10px 0 rgba(0, 0, 0, .1);
    margin: 10px 0 15px;
    background: #fff
  }

  .wrap_comment .contentconfirm p {
    display: block;
    overflow: hidden;
    font-size: 14px;
    color: #333;
    line-height: 21px;
    margin-bottom: 15px
  }

  .wrap_comment .contentconfirm strong {
    display: block;
    overflow: hidden;
    margin-bottom: 10px;
    font-size: 16px;
    color: #4a4a4a
  }

  .wrap_comment .contentconfirm a {
    display: block;
    overflow: hidden;
    font-size: 14px;
    color: #4a90e2
  }

  .wrap_comment .iconcom-email {
    background-position: -75px 0;
    width: 21px;
    height: 14px
  }

  .wrap_comment .iconcom-mcheck {
    background-position: -100px 0;
    width: 24px;
    height: 16px
  }

  .wrap_comment .contentconfirm:after,
  .wrap_comment .contentconfirm:before {
    bottom: 100%;
    left: 19%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none
  }

  .wrap_comment .contentconfirm:after {
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
  }

  .wrap_comment .contentconfirm:before {
    border-bottom-color: #ccc;
    border-width: 11px;
    margin-left: -11px
  }

  .wrap_comment .question {
    display: block;
    overflow: hidden;
    position: relative;
    margin: 0;
    font-size: 14px;
    color: #333;
    line-height: 24px;
    clear: both;
    float: none;
    width: auto
  }

  .wrap_comment .question a {
    color: #4a90e2
  }

  .wrap_comment .question .msgImg {
    display: none
  }

  .wrap_comment .imguserpost {
    display: block;
    overflow: hidden;
    position: relative;
    margin: 10px 0 0
  }

  .wrap_comment .question img {
    display: block;
    height: auto;
    width: auto;
    max-width: 100%;
    background: none;
    max-height: 500px
  }

  .wrap_comment .iconcom-zoom {
    background-position: 0 -55px;
    width: 45px;
    height: 45px;
    position: absolute;
    left: 0;
    bottom: 0
  }

  .wrap_comment .actionuser {
    display: block;
    height: 34px;
    position: relative;
    margin: -5px 10px 0 0;
    font-size: 14px;
    color: #333;
    line-height: 24px
  }

  .wrap_comment .actionuser .respondent {
    float: left;
    padding: 5px 10px 0 0;
    font-size: 13px;
    color: #288ad9
  }

  .wrap_comment .actionuser .favor {
    float: left;
    padding: 5px 10px 0 0;
    font-size: 13px;
    color: #288ad9
  }

  .wrap_comment .actionuser .favor:before {
    float: left;
    content: '-';
    color: #999;
    font-size: 14px;
    margin-right: 5px
  }

  .wrap_comment .actionuser .favor span {
    font-size: 14px;
    color: #95a5a6
  }

  .wrap_comment .actionuser .time {
    float: left;
    padding: 5px 0;
    font-size: 13px;
    color: #999;
    position: relative
  }

  .listreply:after,
  .listreply:before {
    top: -20px;
    left: 18px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none
  }

  .listreply:after {
    border-color: rgba(255, 255, 255, 0);
    border-bottom-color: #dfdfdf;
    border-width: 10px;
    margin-left: -10px
  }

  .listreply:before {
    border-color: rgba(238, 238, 238, 0);
    border-bottom-color: #f8f8f8;
    border-width: 11px;
    margin-left: -11px;
    z-index: 1
  }

  .wrap_comment .actionuser .time:before {
    float: left;
    content: '-';
    color: #999;
    font-size: 14px;
    margin-right: 5px
  }

  .wrap_comment .actionuser .time b {
    float: right;
    position: absolute;
    top: 16px;
    right: -10px
  }

  .wrap_comment .actionuser .time b:after,
  .wrap_comment .actionuser .time b:before {
    top: 100%;
    left: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none
  }

  .wrap_comment .actionuser .time b:after {
    border-top-color: #fff;
    border-width: 3px;
    margin-left: -3px
  }

  .wrap_comment .actionuser .time b:before {
    border-top-color: #999;
    border-width: 5px;
    margin-left: -5px
  }

  .wrap_comment .iconcom-like {
    background-position: -130px 0;
    width: 9px;
    height: 12px;
    vertical-align: inherit;
    margin: 0 5px 0 3px
  }

  .wrap_comment .iconcom-unlike {
    background-position: -112px -115px;
    width: 9px;
    height: 12px;
    vertical-align: inherit;
    margin: 0 5px 0 3px
  }

  .wrap_comment .iconcom-likeAct {
    background-position: -183px -83px;
    width: 9px;
    height: 12px;
    vertical-align: inherit;
    margin: 0 5px 0 3px
  }

  .wrap_comment .iconcom-unlikeAct {
    background-position: -97px -115px;
    width: 9px;
    height: 12px;
    vertical-align: inherit;
    margin: 0 5px 0 3px
  }

  .wrap_comment .iconcom-edit {
    background-position: -145px 0;
    width: 12px;
    height: 12px;
    vertical-align: inherit;
    margin: 0 3px
  }

  .wrap_comment .wrapexport {
    display: none;
    overflow: visible;
    position: absolute;
    left: 9%;
    top: 40px;
    z-index: 91;
    width: 190px;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 3px;
    padding: 15px;
    margin: auto
  }

  .wrap_comment .wrapexport:after,
  .wrap_comment .wrapexport:before {
    bottom: 100%;
    left: 65.5%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none
  }

  .wrap_comment .wrapexport:after {
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
  }

  .wrap_comment .wrapexport:before {
    border-bottom-color: #ccc;
    border-width: 11px;
    margin-left: -11px
  }

  .wrap_comment .wrapexport h4 {
    display: block;
    overflow: hidden;
    font-size: 14px;
    color: #4a90e2;
    line-height: 1.3em;
    padding: 0 0 10px 3px
  }

  .wrap_comment .wrapexport h4.wrong {
    color: #4a90e2;
    padding: 0
  }

  .wrap_comment .wrapexport div {
    display: block;
    overflow: hidden;
    font-size: 12px;
    color: #999;
    margin-bottom: 5px
  }

  .wrap_comment .wrapexport div span {
    display: inline-block;
    vertical-align: middle
  }

  .wrap_comment .wrapexport div p {
    display: inline-block;
    color: #4a90e2
  }

  .wrap_comment .wrapsatis {
    display: none;
    overflow: visible;
    position: absolute;
    left: 9%;
    top: 40px;
    z-index: 91;
    width: 485px;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 3px;
    padding: 10px;
    margin: auto
  }

  .wrap_comment .wrapsatis:after,
  .wrap_comment .wrapsatis:before {
    bottom: 100%;
    left: 40.5%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none
  }

  .wrap_comment .wrapsatis:after {
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -100px
  }

  .wrap_comment .wrapsatis:before {
    border-bottom-color: #ccc;
    border-width: 11px;
    margin-left: -101px
  }

  .wrap_comment .wrapsatis span {
    margin-bottom: 7px;
    display: block;
    width: 95%
  }

  .wrap_comment .wrapsatis input {
    padding: 10px 5px;
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    font-size: 14px;
    color: #333;
    width: 191px;
    margin-right: 10px
  }

  .wrap_comment .wrapsatis .ustCt {
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    font-size: 14px;
    color: #333;
    width: 460px;
    height: 80px;
    margin: 0 0 10px;
    padding: 5px
  }

  .wrap_comment .wrapsatis a {
    padding: 10px 15px !important;
    background-color: #288ad6;
    color: #fff;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px
  }

  .wrap_comment .wrapsatis .wrsct {
    position: relative
  }

  .wrap_comment .wrapsatis .wrsct i {
    width: 11px;
    height: 11px;
    background-position: -201px -83px;
    top: 0;
    right: 0;
    position: absolute;
    cursor: pointer
  }

  .wrap_comment .actionuser .mwrs {
    color: #d97f00;
    font-weight: bold;
    float: right;
    padding: 5px 5px 0 0
  }

  .wrap_comment .iconcom-mbile {
    background-position: -175px 0;
    width: 9px;
    height: 18px;
    margin: 0 3px
  }

  .wrap_comment .listreply {
    display: block;
    position: relative;
    margin: 5px 0 0 0;
    padding: 10px 15px 0 12px;
    clear: both;
    font-size: 14px;
    color: #333;
    line-height: 24px;
    background: #f8f8f8;
    border: 1px solid #dfdfdf
  }

  .wrap_comment .reply {
    display: block;
    font-size: 14px;
    color: #333;
    line-height: 22px;
    margin-bottom: 7px;
    border-bottom: 1px solid #dfdfdf
  }

  .wrap_comment .reply:last-child {
    border: none;
    margin: 0
  }

  .wrap_comment .reply .rowuser {
    margin-bottom: 2px
  }

  .wrap_comment .reply .adm {
    background: #f1c40f;
    border-radius: 2px;
    padding: 0 5px;
    margin: 4px 0 4px 10px;
    line-height: normal;
    border: 1px solid #f1c40f;
    font-size: 12px;
    color: #333
  }

  .wrap_comment .reply .cont {
    display: block;
    overflow: hidden;
    margin: 0;
    clear: both
  }

  .wrap_comment .reply .cont a {
    color: #4a90e2
  }

  .wrap_comment .reply .actionuser a {
    padding: 5px 5px 0 0
  }

  .wrap_comment .reply .actionuser {
    margin: 0
  }

  .wrap_comment .reply .actionuser .time b:after {
    border-top-color: #f1f1f1
  }

  .wrap_comment .reply .cont_n {
    display: block;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    margin-bottom: 10px
  }

  .wrap_comment .inputreply {
    display: none;
    overflow: hidden;
    margin: 0
  }

  .wrap_comment .inputreply .txtEditor {
    margin: 0 0 10px 0;
    min-height: auto;
    height: 20px
  }

  .wrap_comment .fullcomment {
    display: block;
    overflow: hidden;
    padding: 8px 5px;
    margin: -3px 0 0 -5px;
    background: transparent;
    font-size: 14px;
    color: #4a90e2
  }

  .wrap_comment .iconcom-comblue {
    background-position: -160px 0;
    width: 10px;
    height: 10px
  }

  .wrap_comment .extant {
    display: block;
    overflow: hidden;
    position: relative;
    padding: 5px 0;
    width: 100px;
    margin: 10px auto;
    font-size: 14px;
    color: #4a90e2;
    text-align: center;
    border: 1px solid #4a90e2;
    border-radius: 4px;
    background: #fffbea
  }

  .wrap_comment .extant b {
    width: 0;
    height: 0;
    border-top: 5px solid #4a90e2;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    float: right;
    margin: 6px 10px 0 0
  }

  .wrap_comment .ajaxcomment {
    overflow: hidden;
    position: fixed;
    left: 0;
    right: 0;
    bottom: 0;
    height: 100vh;
    background: rgba(0, 0, 0, .5);
    z-index: 9
  }

  .wrap_comment .fixcom {
    position: fixed;
    margin: auto;
    left: 0;
    right: 0
  }

  .wrap_comment .wrap_popup {
    display: block;
    overflow: hidden;
    position: relative;
    width: 100%;
    max-width: 520px;
    margin: auto;
    background: #fff;
    margin-top: 5%;
    border-radius: 5px
  }

  .wrap_comment .titlebar {
    display: block;
    overflow: hidden;
    padding: 10px;
    font-size: 17px;
    color: #333;
    border-bottom: 1px solid #f2f2f2;
    font-weight: bold
  }

  .wrap_comment .closedpopup {
    float: right;
    width: 30px;
    height: 30px;
    position: absolute;
    top: 5px;
    right: 5px
  }

  .wrap_comment .iconcom-closedpopup {
    background-position: -60px -25px;
    width: 16px;
    height: 16px;
    display: block;
    margin: 7px auto 0
  }

  .wrap_comment .wrap_popup .listcomment {
    margin: 10px;
    max-height: 90vh;
    overflow-y: auto;
    overflow-x: hidden
  }

  .wrap_comment .areainput {
    display: none;
    overflow: visible;
    padding: 10px 2%;
    background: #f2f2f2;
    position: fixed;
    bottom: 0;
    left: 0;
    right: 0;
    margin: auto;
    width: 96%;
    max-width: 586px
  }

  .wrap_comment .areainput .wrap_emotion {
    display: none;
    position: absolute;
    left: 0;
    right: 0;
    bottom: 50px;
    width: 96%;
    max-width: 600px;
    margin: auto
  }

  .wrap_comment .areainput .motionsend {
    display: block;
    margin: 10px 0 0
  }

  .wrap_comment .usermember {
    margin: 10px 0
  }

  .wrap_comment .usermember span {
    font-weight: bold;
    margin-right: 10px;
    text-transform: capitalize
  }

  .wrap_comment .usermember div {
    background: #ccc;
    margin-right: 7px;
    text-align: center;
    color: #666;
    text-transform: uppercase;
    font-size: 12px;
    line-height: 26px;
    font-weight: 600;
    float: left;
    width: 25px;
    height: 25px;
    background: #ccc;
    -webkit-border-radius: 30px;
    -moz-border-radius: 30px;
    border-radius: 30px
  }

  .wrap_comment .usermember a {
    display: inline-block;
    padding: 4px 0 0;
    border: 0;
    font-size: 14px;
    color: #4a90e2;
    margin: 0
  }

  .wrap_comment .cmt_right span {
    display: inline-block;
    float: left;
    padding: 4px 0 0;
    border: 0;
    font-size: 14px;
    margin: 0 5px
  }

  .wrap_comment .cmt_right a {
    display: inline-block;
    padding: 4px 0 0;
    border: 0;
    font-size: 14px;
    color: #4a90e2;
    margin: 0
  }

  .wrap_comment .areainput .txtEditor {
    min-height: auto;
    height: 20px
  }

  .wrap_comment .attachimg {
    display: block;
    overflow: hidden;
    margin: 5px 0
  }

  .wrap_comment .attachimg img {
    display: inline-block;
    width: 45%;
    max-width: 150px;
    height: 135px;
    vertical-align: middle
  }

  .wrap_comment .attachimg div {
    display: inline-block;
    font-size: 14px;
    color: #999;
    vertical-align: middle;
    text-align: center;
    width: 45%
  }

  .wrap_comment .attachimg div a {
    display: block;
    overflow: hidden;
    text-align: center;
    padding: 5px 0;
    font-size: 14px;
    color: #d0021b
  }

  .wrap_comment .iconcom-back {
    background-position: -35px -25px;
    width: 15px;
    height: 15px;
    display: block;
    margin: 7px auto
  }

  .wrap_comment .iconcom-close {
    background-position: -58px -25px;
    width: 20px;
    height: 20px;
    display: block;
    margin: 7px auto
  }

  .wrap_comment .back {
    float: right;
    width: 30px;
    height: 30px;
    position: absolute;
    top: 5px;
    right: 5px
  }

  .wrap_comment .forminfo {
    display: block;
    overflow: hidden;
    background: #fff;
    padding: 10px
  }

  .wrap_comment .forminfo input {
    display: block;
    padding: 8px;
    width: 100%;
    margin: 10px 0;
    height: 35px;
    border: 1px solid #dadada;
    background: #fff;
    border-radius: 4px;
    font-size: 14px;
    box-sizing: border-box
  }

  .wrap_comment .forminfo a {
    color: #4a90e2;
    margin: 5px 0 12px;
    display: inline-block
  }

  .wrap_comment .forminfo .lbMsgPopCmt {
    display: block;
    color: #d0021b;
    margin: 5px 0
  }

  .wrap_comment .forminfo button {
    display: block;
    width: 100%;
    margin: 0 auto 10px;
    padding: 8px;
    height: 40px;
    font-size: 14px;
    color: #fff;
    text-transform: uppercase;
    border: 1px solid #4a90e2;
    border-radius: 4px;
    background: #4a90e2;
    cursor: pointer
  }

  .wrap_comment .textsort {
    display: block;
    overflow: hidden;
    padding: 10px;
    font-size: 14px;
    color: #999
  }

  .wrap_comment .listedit {
    display: block;
    overflow: hidden;
    padding: 10px
  }

  .wrap_comment .listedit li {
    display: block;
    overflow: hidden;
    padding: 10px 0;
    border-bottom: 1px solid #dadada;
    background: #fff
  }

  .wrap_comment .listedit li .imgedit {
    float: left;
    overflow: visible;
    position: relative;
    width: 30px;
    height: 30px
  }

  .wrap_comment .listedit li .imgedit img {
    float: left;
    width: 24px;
    height: 24px;
    margin-top: 2px
  }

  .wrap_comment .listedit li .usertime {
    display: block;
    overflow: hidden;
    font-size: 14px;
    color: #666
  }

  .wrap_comment .listedit li .infopost {
    display: block;
    overflow: hidden;
    font-size: 14px;
    color: #333
  }

  .wrap_comment .listedit li a {
    color: #4a90e2
  }

  .wrap_comment .hide {
    display: none !important
  }

  .wrap_comment .qtv {
    background: #f1c40f;
    border-radius: 2px;
    padding: 0 5px;
    margin: 4px 0 4px 10px;
    line-height: normal;
    border: 1px solid #f1c40f;
    font-size: 11px;
    color: #333;
    font-weight: normal;
    display: inline-block;
    margin: 5px 0 0 10px
  }

  .wrap_comment .seeMore,
  .wrap_comment .content_s .seeMore {
    color: #4a90e2;
    cursor: pointer;
    white-space: nowrap
  }

  .wrap_comment .trCmtNew {
    background: #fffadd
  }

  .wrap_comment .trCmt {
    background: #fff;
    transition: background 3s linear;
    -webkit-transition: background 3s linear;
    -moz-transition: background 3s linear
  }

  .wrap_comment .trCmtChild {
    transition: background 3s linear;
    -webkit-transition: background 3s linear;
    -moz-transition: background 3s linear
  }

  .wrap_comment .textarea .ptr {
    margin: 0 auto;
    width: 80%;
    text-align: center
  }

  .wrap_comment .textarea .ptr img {
    max-height: 80%;
    max-width: 80%
  }

  .wrap_comment .textarea .ptr span {
    display: block;
    margin-top: 10px;
    color: #999
  }

  .wrap_comment .textarea .ptr span a {
    cursor: pointer;
    color: #f00
  }

  .wrap_comment .captchacmt {
    margin: 3px 5px 5px;
    float: left
  }

  .wrap_comment .captchacmt img {
    max-width: 55px;
    float: left
  }

  .wrap_comment .captchacmt img.imgcaptcha {
    width: auto;
    height: 25px;
    border: 1px solid #ddd;
    margin-right: 10px
  }

  .wrap_comment .captchacmt input {
    max-width: 90px;
    height: 27px;
    border: 1px solid #ddd;
    text-align: center
  }

  .wrap_comment .captchacmt i {
    color: #f00;
    margin-right: 5px;
    padding: 3px 10px;
    background: #000
  }

  .wrap_comment .captchacmt span {
    color: #f00;
    font-weight: bold;
    padding: 4px 6px 0
  }

  .wrap_comment .pagcomment {
    display: block;
    padding: 0;
    overflow: hidden;
    margin: 10px auto;
    clear: both
  }

  .wrap_comment .pagcomment a {
    float: left;
    padding: 4px 10px;
    background: #eee;
    border-radius: 3px;
    text-align: center;
    color: #333;
    margin-right: 4px;
    font-size: 12px;
    cursor: pointer
  }

  .wrap_comment .pagcomment a:hover {
    background: #ddd
  }

  .wrap_comment .pagcomment span {
    float: left;
    padding: 4px 10px;
    background: #eee;
    border-radius: 3px;
    text-align: center;
    color: #333;
    margin-right: 4px;
    font-size: 12px;
    clear: none !important;
    cursor: pointer
  }

  .wrap_comment .pagcomment span.active {
    float: left;
    padding: 4px 10px;
    background: #ccc;
    border-radius: 3px;
    text-align: center;
    color: #333;
    margin-right: 4px;
    font-size: 12px;
    clear: none !important;
    cursor: pointer
  }

  .wrap_comment .iconcom-user {
    width: 25px;
    height: 25px;
    background-image: none;
    background-color: #ccc;
    margin-right: 7px;
    text-align: center;
    color: #fff;
    text-transform: uppercase;
    font-size: 12px;
    line-height: 26px;
    font-style: normal
  }

  .wrap_comment .avaS {
    float: left;
    width: 25px;
    height: 25px
  }

  .wrap_comment .sortcomment {
    display: block;
    overflow: hidden;
    margin-right: 3px
  }

  .wrap_comment .sortcomment span {
    float: right;
    font-size: 13px;
    color: #999;
    padding: 6px 12px
  }

  .wrap_comment .sortcomment a {
    float: right;
    font-size: 13px;
    color: #4a90e2;
    padding: 6px 12px
  }

  .wrap_comment .sortcomment a:hover {
    color: #333
  }

  .wrap_comment .sortcomment a.activedsort {
    background: #ececec;
    border-radius: 7px;
    -webkit-border-radius: 7px;
    -moz-border-radius: 7px
  }

  .wrap_comment .sortcomment .statistical {
    float: left;
    overflow: hidden;
    font-size: 12px;
    color: #565656;
    padding: 6px 18px;
    background: #fff4b7;
    border-radius: 4px;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    margin-top: 5px
  }

  .wrap_comment .sortcomment .statistical a {
    color: #4a90e2;
    padding: 0 5px
  }

  .wrap_comment .replyLate {
    display: block;
    overflow: visible;
    position: relative;
    margin: 0 0 10px 0;
    padding: 8px;
    clear: both;
    font-size: 13px;
    color: #333;
    line-height: 24px;
    border: dashed #ccc 1px
  }

  .wrap_comment .replyLate:before {
    content: '';
    position: absolute;
    top: -7px;
    left: 14px;
    border-top: 1px dashed #ccc;
    border-left: 1px dashed #ccc;
    transform: rotate(36deg) skew(-20deg);
    width: 10px;
    height: 10px;
    background-color: #fff
  }

  .wrap_comment .iconcom-arrownocomment {
    background-image: url(//s.tgdd.vn/comment/Content/images/bg_comment.png);
    background-position: 0 -100px;
    width: 70px;
    height: 140px;
    float: left;
    background-size: auto
  }

  .wrap_comment .iconcom-nocomment {
    background-image: url(//s.tgdd.vn/comment/Content/images/bg_comment.png);
    background-position: 0 0;
    width: 85px;
    height: 85px;
    display: block;
    margin: 0 auto 28px;
    background-size: auto
  }

  .wrap_comment .info_nocomment {
    display: block;
    overflow: hidden;
    width: 80%;
    margin: 20px auto 0;
    text-align: center
  }

  .iconcom-txtstar {
    background-position: -241px -70px;
    width: 12px;
    height: 12px
  }

  .iconcom-txtunstar {
    background-position: -258px -70px;
    width: 12px;
    height: 12px
  }

  .iconcom-star {
    background-position: -152px -67px;
    width: 22px;
    height: 22px
  }

  .iconcom-unstar {
    background-position: -122px -67px;
    width: 22px;
    height: 22px
  }

  .iconcom-likeR {
    background-position: -180px -70px;
    width: 12px;
    height: 12px
  }

  .iconcom-uncheck {
    width: 17px;
    height: 16px;
    background-position: 0 -112px
  }

  .iconcom-check {
    background-position: -20px -112px;
    width: 17px;
    height: 16px
  }

  .iconcom-prev {
    background-position: -44px -92px;
    width: 12px;
    height: 18px
  }

  .iconcom-next {
    background-position: -59px -92px;
    width: 12px;
    height: 18px
  }

  .wrap_comment .midcmt {
    overflow: hidden
  }

  .wrap_comment .midcmt .tech {
    font-weight: normal;
    cursor: pointer;
    font-size: 14px
  }

  .wrap_comment .midcmt .iconcom-uncheck,
  .wrap_comment .midcmt .iconcom-check {
    margin: 0 5px 5px 15px
  }

  .wrap_comment .forminfo .cgd {
    margin: 0 0 10px
  }

  .wrap_comment .forminfo .ed {
    margin-top: 10px
  }

  .wrap_comment .forminfo .cgd span {
    margin-right: 10px;
    cursor: pointer
  }

  .wrap_comment .seeAllCmt {
    width: 100%;
    display: inline-block;
    padding: 5px;
    text-align: center;
    color: #4a90e2;
    border: solid 1px #dadada;
    border-radius: 4px;
    margin: 0 0 5px;
    box-sizing: border-box
  }

  .wrap_comment .resCmtImg {
    display: inline-block;
    position: relative;
    margin: 20px 0 0
  }

  .wrap_comment .resCmtImg li {
    float: left;
    margin-right: 20px;
    position: relative
  }

  .wrap_comment .resCmtImg img {
    max-width: 150px
  }

  .wrap_comment .resCmtImg i {
    border: solid 1px #4d4d4d;
    background: #4d4d4d;
    height: 25px;
    width: 25px;
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    border-radius: 15px;
    position: absolute;
    color: #fff;
    font-size: 16px;
    text-align: center;
    padding-top: 2px;
    padding-left: 1px;
    cursor: pointer;
    font-style: normal;
    box-sizing: border-box;
    right: -10px;
    top: -10px
  }

  .wrap_comment .lbMsgCmt {
    display: block;
    margin: 10px 0;
    color: #d0021b
  }

  .wrap_comment .borderWn {
    border-color: #d0021b !important
  }

  .wrap_comment .listcomment .imgCmt img {
    max-height: 150px;
    float: left
  }

  .wrap_comment .wrap_popup_success {
    display: block;
    overflow: hidden;
    position: relative;
    width: 210px;
    max-width: 640px;
    margin: 10% auto 0;
    background: #fff;
    border-radius: 5px;
    text-align: center;
    padding: 5px
  }

  /* 01:50:03 11/02/2020 */
  .boxRatingCmt {
    border-bottom: 1px solid #e4e4e4;
    margin-bottom: 20px
  }

  .boxRatingCmt .toprt {
    border: solid 1px #ddd;
    border-radius: 5px;
    padding: 5px 15px;
    margin-bottom: 20px
  }

  .boxRatingCmt .hrt {
    overflow: hidden;
    padding-bottom: 5px;
    margin-bottom: 15px
  }

  .boxRatingCmt .crt {
    height: 120px;
    box-sizing: border-box
  }

  .boxRatingCmt .crt .lcrt {
    width: 17%;
    float: left;
    border-right: solid 1px #eee;
    padding-top: 31px;
    height: 90%;
    text-align: center;
    box-sizing: border-box;
    margin: 5px 10px 5px 5px
  }

  .boxRatingCmt .crt .lcrt b {
    font-size: 40px;
    color: #fd9727;
    line-height: 40px
  }

  .boxRatingCmt .crt .lcrt b i {
    vertical-align: initial;
    width: 32px;
    height: 32px;
    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEAAAABACAYAAACqaXHeAAAABGdBTUEAALGPC/xhBQAABulJREFUeAHtW22IVFUYPu+ZYXe1rdytzE2x2IL9Si3sw7R00TJRwYKUjKC29rMgSuxfSFBBf8o+iN1hzUAIarEfoSUKqX2R/RA03Z3RIiIyU3R2CT92Z3fO23OuzjLNzp2558zcOys1IPfe975fz3Pe895zz15JlOiX7K5/g4jbdXgmGQl1RF8pRSpUiqDc3fCSEurt9NhSyA3UFd2cLgviPHACuK+pks8mT7LgynSAJOgcXReqoXX959Llfp9LvwNM8H82uT4TvNZxZIPJJybo+ywInAAAbXPDxCxc77nZFCoPlADuaZrHQtztljQz36V13O77IQ+UACWSeUfYi04xiQisCXLffVM4Hv8TZT4tFwAiMUTV1TfRuh8u5tIr1r3gKiA+tDYfeA3K0YFusQDm8xMYASxU3vJPJWuim7KxPQYyBTgyp16pRNQkSSnLGqjjSMzExkY3kApQPOp59FMgbGxStiZH3ysAK78yjo+dwNy+3igxEmeoOjwTK8OEiZ2prv8VcJYfMQWvQTg2cfWoKSBTfd8JKKShFWLrlQhfpwBvnVPLicQvGE2rOFgTMJWV3UbPHPnVKyBTPV8rQI2MPmsLXgPRtiox2moKykTfNwJ4X3MYI9hikkw2XZTO09pXtnvFkPlGgDh2ehVebmoKTdLxcfzU6kL9uNn7RkAxGxiz91WkG1A3uefmxB/WXS1YVgslq9DSqgUnq0QSR0FVipRzhDMcuQqtSx/1q29RCIZfJYgOwecggMSZKI4dlDicxxF/UJ+LEDsyocrjQoYHqePgBTfQ6XKHAO6uv0VIXosos+GsipgdQJeAAhBAYiPDt3mYnlCxzgFsBKSBIJDDIIdAnCYL11Lw74IrtlPX4RPEvY0P8FhyN0ZrSrGCXwl+nD1IEsslwL/1XwOvB0jvQQL3Zj1Hb78SRsyXHJnnSswTo9dUXxIpmVOKSZJig9MwSpZEaQITUYLCoY2S2mNfkwgvw6rtTGlSCT4qwMeJxcPU1r/XeQzqFJwXl5HETjSGhuBTCi4iwP+Mql+NgT+uo44vVPQbF1VMWYhK+Cq4dIKNBPDfoOwXpMD/iwB9QS2HhqiuZgUaY2+wqQUQjWgbVYceotZ+vTga/41PgXHJ5ROO1L3MSryJKTFeJZk6V8I1KpoBchN1Hns9W76uBGhljjRgO4s/xr+p2Ywnuwzgh4lDT1HXQJ9brjkJ0EbcWz+fk2JHMV5t3ZLwQw5gpyks11Bb9EAu/3nLm9piBylUdg/YPJzL0WS6h2bXj7X+vfnA65zzEqCVqO2nP7BFfT+c7tTXk/kH8Huo8tqF1BX7zUuengjQjvSXG9T5+BpB8l0vjkuiQ7KH6masoid//Ntr/Lw9IJsj7ml4Djs+72HTMpTtftAygFAk5Eabb4ysCNAA8SHDCuaxT/GYvCZowOnxUPLnAWI9dcZ2pMu9nlsToANwpH65UrzbazA/9GQotJLaB3bZ+vbcA7IGIJ6VVR6kUCVnFBKuIAKUoiWFBC+GLfYxmwvxUxABeKUsOQGF5mBNgN5Jxr7azYWwXwxbnQNHmmbb+rImAEuoko/+OGhWzePnhifWBKhJUP4prIXkYk0A/ngyaSqASFnnYkUA986dxULUpkag1EesSG/l7nkzbfKwIkCMjVgzbpOkJxtpl5MVAYpK//zPJMW2D1gRgPXzpKsA2/WA8bsAf9Q0Qw2PncwcAZtrvMjsgx36KTfb2GfayIpwDbX0/5Upz3VtXgEj9h03lQh2l4aklG2yM7aUOqJL9bmWpe5bH4d5samtMQGKCyMAo76dysP4DDa6RSeLa9bnjkzQZ6YA0vUVJY2npvFHD0h4CUo2Pa6nc4zwCRKh56lz4PNsBpdL9zHuaVzDIvkBQhg/1rBlZ0yAUQXw1jtvAPjGbADcZACODzOwVVU5rdENfLqt1tG6jo22NfpxI0fmG32Sa0SAGLtoNMcAPkYUXhzqjHYZ7dNhT8+xga324ZUDVA0oO2+UoxEBSnl7/GGajCLp12h27R3U0f+dVwCZetpW+3B8XfKZqTLhWgnRPEGYQ2DUA/DMXJSvJjEPD5CUrbJ9oF+IYzlCe7tFK3eNQHMTb2noE6OiF6+/C3JZ6hxz3c+8Z1QBMMbXY9l/AH5OEr2ArfNF2KMD+OL+qDV6VPt2YiBWDu/+9QCM/v5sgVHyX+AxhiYXe5/oVVShPz/t24khQ03oDV9mi4Icv88md5MZrQR529zpfGFkD5qN83/7APwUSXqR2qOfuAXwU8499evxVHoHoKfrOE7T5YoH9fd/XuMaEaCdct/akIgf1fOsXJTf+C217B/2GswPPTz2pqLzL8MOVULwVXvxhahuwP//vDLwD24ZMzJkloX5AAAAAElFTkSuQmCC');
    background-size: 32px 32px
  }

  .boxRatingCmt .crt .lcrt span {
    display: block;
    color: #999;
    font-size: 13px;
    margin-top: 8px
  }

  .boxRatingCmt .crt .rcrt {
    font-size: 13px;
    overflow: hidden;
    box-sizing: border-box;
    padding: 10px 0;
    width: 45%;
    float: left;
    border-right: solid 1px #eee
  }

  .boxRatingCmt .crt .rcrt span.t {
    display: inline-block;
    color: #333
  }

  .boxRatingCmt .crt .rcrt span.t i {
    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABGdBTUEAALGPC/xhBQAAAj1JREFUSA21ljuLE1EUxzOTDRMYtpg0phdsAoIirlss4naCIllIgmDARbPNEj+AVTo7EWJjsIiEsHl0sh9g++CrSLWWrpAUu4UPlGwSf0dmwp0XM8h44HDPPed//ufcx+RGS8WUer1uTCaToyWSz+dvNZvN33FS9TggwUyn0yLcNzA3KbQTNy92gcViUVNIVVtx+03N7/J7KpXKRQocE3HwS+xLw+Hwsx/t9sRaAeSPFXJhkEKPxIiSyAKNRmMNkodeIk3Tdu2YN+SaRxYYj8d3yci7sphw4BfsmDfkmjt7mqpWq+ZsNsvRmUVybj6fWyBz6B563ZVlT8COwL5ieqqqZVlnrVbrp8C0crn8hvE+wIw4EhT5Tg7WIL6JkTS59Gmg23o6nS5inIgnSWH7vuq6XtR7vd4HiDdQGZOSj5lMZqPf77//e4v4YE6y2ewW7G8TqHAIx1a32/0iXKtr2ul0fhQKBdmu5xL4F2FbXsBxj4a/O/mra+o4ZORm7XP4L1VflM1+P2FLml7cagVqgE7eqfOY9igIF1jAvrpB+FBfWM5/L+A7g1KplKbNM3Q9tN3gwDfcFgc8V8O+FXBYVwEEkS85m9eixOU98Mo6H+0Vr9NXIGQvj0neHgwGNVGxIZIHyCW8G/Kz45KoAud0/Mw0zct88UdOptjikxi+c8fP6Csgj4lLSMqyihTjCK1xtz+5APak3W7/wnzKc9qnc9m2a+SZXmzQCqqAbgPeDCNXSWyM/Nu4YxjGAzUm9h+0KskbKVc12wAAAABJRU5ErkJggg==');
    width: 12px;
    height: 12px;
    background-size: 12px 12px;
    display: inline-block
  }

  .boxRatingCmt .crt .rcrt span.c {
    display: inline-block;
    color: #288ad6;
    cursor: pointer
  }

  .boxRatingCmt .crt .rcrt span.c:hover {
    color: #0c72c1
  }

  .boxRatingCmt .crt .rcrt span.n {
    color: #333;
    text-decoration: unset !important;
    cursor: unset !important
  }

  .boxRatingCmt .crt .bcrt a.close-btt {
    background: #fff;
    color: #288ad6;
    border: 1px solid #ddd
  }

  .boxRatingCmt .crt .rcrt .bgb {
    width: 55%;
    background-color: #e9e9e9;
    height: 5px;
    display: inline-block;
    margin: 0 10px;
    border-radius: 5px
  }

  .boxRatingCmt .crt .rcrt .bgb .bgb-in {
    background-color: #f25800;
    background-image: linear-gradient(90deg, #ff7d26 0%, #f25800 97%);
    height: 5px;
    border-radius: 5px 0 0 5px;
    max-width: 100%
  }

  .boxRatingCmt .crt .rcrt .r {
    padding: 1px 20px
  }

  .boxRatingCmt .crt .bcrt {
    overflow: hidden
  }

  .boxRatingCmt .crt .bcrt a {
    display: block;
    width: 200px;
    margin: 41px auto 0;
    padding: 10px;
    color: #fff;
    background-color: #288ad6;
    border-radius: 5px;
    text-align: center;
    box-sizing: border-box
  }

  .boxRatingCmt .rtpLnk {
    display: inline-block;
    padding: 7px 20px;
    color: #288ad6;
    border: solid 1px #288ad6;
    border-radius: 3px;
    text-align: center;
    box-sizing: border-box;
    margin: 0 0 20px
  }

  .boxRatingCmt .rtpLnk span {
    margin-left: 10px;
    font-size: 18px
  }

  .boxRatingCmt .tltRt {
    float: left;
    overflow: hidden;
    display: inline-block;
    width: auto;
    margin-right: 15px;
    max-width: 430px
  }

  .boxRatingCmt .tltRt h3 {
    display: block;
    line-height: 1.3em;
    font-size: 20px;
    color: #333
  }

  .boxRatingCmt .tltRt a {
    color: #288ad6;
    font-size: 13px
  }

  .boxRatingCmt .first {
    max-width: none
  }

  .boxRatingCmt .sRt {
    overflow: hidden;
    padding: 5px 0;
    width: auto;
    border-left: solid 1px #ddd;
    padding-left: 20px;
    vertical-align: middle;
    box-sizing: border-box;
    float: left
  }

  .boxRatingCmt .sRt a {
    padding: 6px 10px;
    border: 1px solid #288ad6;
    background: #288ad6;
    font-size: 13px;
    color: #fff;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    height: 34px;
    text-align: center;
    width: 190px
  }

  .boxRatingCmt .sRt span {
    cursor: pointer
  }

  .boxRatingCmt .sRt i {
    margin-right: 8px;
    display: inline-block;
    width: 11px;
    height: 11px;
    background-position: -201px -83px;
    text-indent: -999999px;
    margin-top: -3px
  }

  .boxRatingCmt form {
    display: block;
    overflow: hidden;
    padding: 10px 0
  }

  .boxRatingCmt form .ips {
    margin: 0 0 10px;
    height: 25px
  }

  .boxRatingCmt form .ips span:first-child {
    display: inline-block;
    margin-top: 2px;
    float: left;
    margin-right: 5px
  }

  .boxRatingCmt form .ips span.rsStar {
    display: inline-block;
    margin-left: 10px;
    position: relative;
    background: #52b858;
    color: #fff;
    padding: 2px 8px;
    box-sizing: border-box;
    font-size: 12px;
    border-radius: 2px
  }

  .boxRatingCmt form .ips span.rsStar:after {
    right: 100%;
    top: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    border-color: rgba(82, 184, 88, 0);
    border-right-color: #52b858;
    border-width: 6px;
    margin-top: -6px
  }

  .boxRatingCmt form .lStar {
    cursor: pointer;
    margin-left: 5px;
    display: block;
    float: left
  }

  .boxRatingCmt form .lStar i {
    display: inline-block
  }

  .boxRatingCmt form .ct {
    box-sizing: border-box;
    width: 50%;
    float: left;
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    margin-top: 5px
  }

  .boxRatingCmt form .if {
    box-sizing: border-box;
    width: 49%;
    float: right
  }

  .boxRatingCmt form textarea {
    font-size: 14px;
    color: #999;
    padding: 5px;
    margin: 5px 0;
    width: 100%;
    height: 78px;
    resize: none;
    border: none;
    box-sizing: border-box
  }

  .boxRatingCmt form textarea:focus {
    color: #333
  }

  .boxRatingCmt form input {
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    font-size: 14px;
    color: #999;
    padding: 5px;
    margin: 5px 0;
    height: 28px;
    width: 43%;
    display: inline-block;
    float: left;
    margin-right: 10px;
    color: #333
  }

  .boxRatingCmt form a {
    background: #288ad6;
    border: 1px solid #288ad6;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    font-size: 14px;
    color: #fff;
    padding: 9px 0;
    margin: 5px 0;
    width: 46%;
    box-sizing: border-box;
    display: inline-block;
    text-align: center
  }

  .boxRatingCmt .pgrc {
    display: none;
    overflow: hidden;
    clear: both
  }

  .boxRatingCmt .pgrc .pagcomment {
    margin: 5px 0
  }

  .boxRatingCmt .pgrc a {
    float: left;
    padding: 4px 10px;
    background: #eee;
    border-radius: 3px;
    text-align: center;
    color: #333;
    margin-right: 4px;
    font-size: 12px;
    cursor: pointer
  }

  .boxRatingCmt .pgrc a:hover {
    background: #ddd
  }

  .boxRatingCmt .pgrc span {
    float: left;
    padding: 4px 10px;
    background: #eee;
    border-radius: 3px;
    text-align: center;
    color: #333;
    margin-right: 4px;
    font-size: 12px;
    clear: none !important;
    cursor: pointer
  }

  .boxRatingCmt .pgrc span.active {
    float: left;
    padding: 4px 10px;
    background: #ccc;
    border-radius: 3px;
    text-align: center;
    color: #333;
    margin-right: 4px;
    font-size: 12px;
    clear: none !important;
    cursor: pointer
  }

  .boxRatingCmt .ratingLst li.reply {
    margin-left: 18px
  }

  .boxRatingCmt .ratingLst li.reply input {
    border: 1px solid #ddd;
    border-radius: 4px;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    font-size: 14px;
    color: #999;
    padding: 8px;
    width: 385px;
    margin-right: 8px
  }

  .boxRatingCmt .ratingLst li.reply input:focus {
    color: #333
  }

  .boxRatingCmt .ratingLst .rrSend {
    padding: 9px 10px;
    border: 1px solid #288ad6;
    background: #fff;
    font-size: 13px;
    color: #288ad6;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    box-sizing: border-box;
    height: 36px;
    display: inline-block
  }

  .boxRatingCmt .ratingLst .ifrl {
    margin: 10px 0;
    color: #ccc
  }

  .boxRatingCmt .ratingLst .ifrl span {
    color: #333
  }

  .boxRatingCmt .ratingLst .ifrl a {
    color: #288ad6
  }

  .boxRatingCmt .rtQRp {
    font-size: 13px;
    margin-bottom: 15px
  }

  .boxRatingCmt .rtQRp .c {
    border-right: solid 1px #ddd;
    padding-right: 10px;
    margin-right: 10px
  }

  .boxRatingCmt .rtQRp .a {
    color: #288ad6;
    cursor: pointer
  }

  .iconcom-checkbuy {
    background-position: -220px -82px;
    width: 13px;
    height: 13px;
    margin: -4px 4px 0 7px
  }

  .iconcom-like {
    background-position: -130px 0;
    width: 9px;
    height: 12px;
    margin: 0 5px
  }

  .iconcom-rtusr {
    background-position: -126px -112px;
    width: 15px;
    height: 24px;
    margin: 0 5px
  }

  .iconcom-rtadr {
    background-position: -141px -112px;
    width: 15px;
    height: 23px;
    margin: 0 5px;
    float: left
  }

  .iconcom-rttime {
    background-position: -159px -112px;
    width: 15px;
    height: 24px;
    margin: 0 5px
  }

  .boxRatingCmt .ratingLst li {
    position: relative;
    margin: 5px 25px 15px 0
  }

  .boxRatingCmt .ratingLst li .rh span {
    font-weight: bold;
    margin-bottom: 5px;
    display: inline-block;
    text-transform: capitalize
  }

  .boxRatingCmt .ratingLst li .rh label {
    cursor: pointer;
    color: #2ba832;
    font-size: 13px
  }

  .boxRatingCmt .ratingLst li .rh label.qtv {
    background: #f1c40f;
    color: #333;
    font-size: 11px;
    padding: 3px;
    margin-left: 10px
  }

  .boxRatingCmt .ratingLst li .rc {
    margin: 0 0 5px 0
  }

  .boxRatingCmt .ratingLst li .rc i {
    margin-top: -3px;
    font-style: normal;
    line-height: 1.5
  }

  .boxRatingCmt .ratingLst li .rc .rat img {
    max-height: 150px;
    cursor: pointer
  }

  .boxRatingCmt .ratingLst li .rc i u {
    display: none
  }

  .boxRatingCmt .ratingLst li .rc p span {
    margin-right: 10px
  }

  .boxRatingCmt .ratingLst li .rcf {
    display: none;
    overflow: visible;
    border: 1px solid #ccc;
    border-radius: 3px;
    padding: 10px;
    position: absolute;
    top: 18px;
    left: 8px;
    right: 8px;
    z-index: 10;
    box-shadow: 0 10px 10px 0 rgba(0, 0, 0, .1);
    margin: 10px 0 15px;
    background: #fff;
    width: 370px
  }

  .boxRatingCmt .ratingLst li .rcf label {
    font-size: 13px
  }

  .boxRatingCmt .ratingLst li .rcf p {
    line-height: 1.6;
    font-size: 13px
  }

  .boxRatingCmt .ratingLst li .rcf p>i {
    text-transform: capitalize;
    font-style: normal;
    font-weight: bold
  }

  .boxRatingCmt .ratingLst li .rcf p label {
    display: block;
    font-size: 13px
  }

  .boxRatingCmt .ratingLst li .rcf p label .name {
    text-transform: capitalize
  }

  .boxRatingCmt .ratingLst li .rcf:after,
  .boxRatingCmt .ratingLst li .rcf:before {
    bottom: 100%;
    left: 30%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none
  }

  .boxRatingCmt .ratingLst li .rcf:after {
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px
  }

  .boxRatingCmt .ratingLst li .rcf:before {
    border-bottom-color: #ccc;
    border-width: 11px;
    margin-left: -11px
  }

  .boxRatingCmt .ratingLst li .ra a {
    color: #288ad6
  }

  .boxRatingCmt .ratingLst li .ra {
    color: #999
  }

  .boxRatingCmt .ratingLst li .ra a.cmtd {
    color: #999
  }

  .boxRatingCmt .ratingLst li.child {
    margin-left: 18px;
    border-left: 4px solid #efefef;
    padding-left: 10px
  }

  .iconcom-like,
  .iconcom-likeR {
    background-position: -130px 0;
    width: 9px;
    height: 16px;
    margin: 0 5px
  }

  .iconcom-txtstar {
    width: 13px;
    height: 12px;
    background-position: -241px -83px
  }

  .iconcom-txtunstar {
    width: 13px;
    height: 12px;
    background-position: -257px -83px
  }

  .iconcom-unstar {
    width: 22px;
    height: 20px;
    background-position: -121px -80px
  }

  .iconcom-star {
    width: 22px;
    height: 20px;
    background-position: -152px -80px
  }

  .iconcom-uncheck {
    background-size: 275px 128px;
    width: 17px;
    height: 16px;
    background-position: 0 -112px
  }

  .iconcom-check {
    background-position: -20px -112px;
    width: 17px;
    height: 16px
  }

  .iconcom-search {
    background-position: 0 0;
    width: 16px;
    height: 16px
  }

  .wrap_comment .s_comment input {
    height: 36px;
    box-sizing: border-box
  }

  .wrap_comment .s_comment input:focus {
    color: #333
  }

  .wrap_comment .s_comment {
    padding: 10px 0 0 0
  }

  .wrap_comment .totalcomment {
    padding: 20px 0 0 0
  }

  .boxRatingCmt .iconcom-pict {
    background-position: -80px -25px;
    width: 18px;
    height: 16px;
    margin-right: 5px;
    vertical-align: sub
  }

  .boxRatingCmt form .ct .extCt {
    padding: 5px;
    box-sizing: border-box;
    background: #f7f7f7;
    border-top: 1px solid #ddd
  }

  .boxRatingCmt form .ct .extCt label {
    margin: 7px;
    font-size: 13px;
    cursor: pointer
  }

  .boxRatingCmt form .ct .extCt .ckt {
    float: right;
    margin: 7px;
    font-size: 12px
  }

  .boxRatingCmt .resImg {
    display: inline-block;
    position: relative;
    margin: 20px 0 0
  }

  .boxRatingCmt .resImg li {
    float: left;
    margin-right: 20px;
    position: relative
  }

  .boxRatingCmt .resImg img {
    max-width: 150px
  }

  .boxRatingCmt .resImg i {
    border: solid 1px #4d4d4d;
    background: #4d4d4d;
    height: 25px;
    width: 25px;
    -webkit-border-radius: 15px;
    -moz-border-radius: 15px;
    border-radius: 15px;
    position: absolute;
    color: #fff;
    font-size: 16px;
    text-align: center;
    padding-top: 2px;
    padding-left: 1px;
    cursor: pointer;
    font-style: normal;
    box-sizing: border-box;
    right: -10px;
    top: -10px
  }

  .boxRatingCmt .lbMsgRt {
    display: block;
    margin: 10px 0;
    color: #d0021b
  }

  .borderWn {
    border-color: #d0021b !important
  }

  @media screen and (max-width:1200px) {
    .boxRatingCmt .crt .rcrt .bgb {
      max-width: 45%
    }
  }

  #hdFileFeedbackUpload {
    display: none
  }

  .iconcom-mail {
    background-position: -179px -112px;
    width: 19px;
    height: 24px;
    margin: 0 5px
  }

  .iconcom-img {
    background-position: -204px -112px;
    width: 19px;
    height: 20px;
    margin: 0 5px
  }

  .iconcom-close {
    background-position: -60px -25px;
    width: 18px;
    height: 18px;
    display: block
  }

  .lnkFbk {
    float: right;
    display: block;
    color: #288ad6;
    margin-top: 5px
  }

  .lnksimg {
    color: #288ad6;
    margin-top: 10px;
    display: inline-block
  }

  .lnksfb {
    float: right;
    padding: 6px 10px;
    border: 1px solid #ffc801;
    background: #ffc801;
    font-size: 13px;
    color: #333;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    text-align: center;
    margin-right: 7px;
    display: inline-block;
    width: 70px
  }

  .lnksfbI {
    margin-top: 25px
  }

  .wrap_fdback {
    overflow: hidden;
    position: fixed;
    left: 0;
    right: 0;
    bottom: 0;
    height: 115vh;
    background: rgba(0, 0, 0, .5);
    z-index: 9
  }

  .wrap_fdback .pop {
    display: block;
    overflow: hidden;
    position: relative;
    width: 100%;
    max-width: 800px;
    margin: auto;
    background: #fff;
    margin-top: 15%;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px
  }

  .wrap_fdback .pop .hdpop {
    padding: 10px 0 10px 10px;
    font-weight: bold;
    text-transform: uppercase;
    border-bottom: solid 1px #ccc
  }

  .wrap_fdback .pop .hdpop .closehd {
    float: right;
    margin-right: 10px
  }

  .wrap_fdback .pop .ctpop {
    padding: 10px;
    line-height: 25px
  }

  .wrap_fdback .pop .ctpop i {
    font-weight: bold;
    text-decoration: underline;
    margin-top: 10px;
    display: block
  }

  .wrap_fdback .pop .ctpop span {
    display: block
  }

  .wrap_fdback .pop .ctpop textarea {
    border: 1px solid #ccc;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    display: block;
    padding: 5px;
    width: 95%;
    margin: 5px 0;
    height: 120px
  }

  .wrap_fdback .pop .ctpop input {
    border: 1px solid #ccc;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px;
    display: block;
    padding: 5px;
    width: 45%;
    float: left;
    margin-right: 5px;
    margin: 5px 5px 5px 0
  }

  .wrap_fdback .pop .ctpop .sfback {
    margin: 7px 0;
    cursor: pointer
  }

  .wrap_fdback .pop .ctpop .sfback .resImg {
    display: inline-block;
    position: relative
  }

  .wrap_fdback .pop .ctpop .sfback .resImg img {
    width: 50px
  }

  .wrap_fdback .pop .ctpop .sfback .resImg i {
    position: absolute;
    font-style: normal;
    right: -8px;
    top: -8px;
    font-size: 12px
  }

  .wrap_fdback .pop .ctpop a {
    color: #288ad6
  }

  .hide {
    display: none !important
  }

  .boxRtAtc .likeshare {
    float: left
  }

  .boxRtAtc .likewied .messenger {
    color: #288ad6;
    padding: 1px 10px;
    border-radius: 2px;
    display: inline-block;
    font-size: 11px;
    border: 1px solid #eee;
    margin: 5px 0 0 15px;
    cursor: pointer;
    height: 20px;
    box-sizing: border-box
  }

  .boxRtAtc .likewied .act {
    color: #fff;
    background-color: #288ad6;
    border: 1px solid #288ad6
  }

  .iconcom-likeAtc {
    background-position: -178px -52px;
    width: 12px;
    height: 16px;
    margin: 0 5px
  }

  .iconcom-unlikeAtc {
    background-position: -196px -52px;
    width: 12px;
    height: 16px;
    margin: 0 5px
  }

  .bifRtCt {
    text-align: left;
    background: #eee;
    padding: 10px;
    position: relative;
    margin: 15px 0
  }

  .bifRtCt:before {
    content: '';
    position: absolute;
    bottom: 100%;
    left: 27%;
    width: 0;
    height: 0;
    border-bottom: 10px solid #eee;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent
  }

  .bifRtCt textarea {
    display: block;
    overflow: hidden;
    border: 1px solid #d9d9d9;
    border-radius: 4px;
    margin-top: 10px;
    width: 95%;
    padding: 10px 2%
  }

  .bifRtCt span {
    display: block;
    margin: 10px 0 0
  }

  .bifRtCt label {
    display: inline-block;
    overflow: hidden;
    vertical-align: middle;
    font-size: 15px;
    color: #666;
    margin: 10px 15px 0 0;
    cursor: pointer
  }

  .bifRtCt label i {
    float: left;
    width: 16px;
    height: 16px;
    border: 1px solid #999;
    border-radius: 20px;
    position: relative;
    margin-right: 3px
  }

  .bifRtCt label.choosed i:before {
    content: '';
    width: 10px;
    height: 10px;
    background: #fa8926;
    border: 1px solid #fa8926;
    position: absolute;
    top: 0;
    bottom: 0;
    right: 0;
    left: 0;
    display: block;
    margin: auto;
    border-radius: 20px
  }

  .bifRtCt input {
    display: inline-block;
    padding: 10px 0;
    border-radius: 4px;
    border: 1px solid #d9d9d9;
    height: 20px;
    text-indent: 10px;
    width: 49%;
    margin-top: 10px;
    clear: both;
    vertical-align: middle
  }

  .bifRtCt button {
    display: inline-block;
    overflow: hidden;
    padding: 2px 0;
    border: 1px solid #288ad6;
    border-radius: 4px;
    background: #288ad6;
    color: #fff;
    text-transform: uppercase;
    text-align: center;
    width: 49%;
    margin-top: 10px;
    font-weight: 600;
    vertical-align: middle;
    cursor: pointer
  }

  .bifRtCt button span {
    text-transform: none;
    font-weight: normal;
    margin: 0
  }

  .bifRtCt label.alert {
    color: #f00;
    line-height: 28px;
    margin: 10px auto;
    display: block;
    text-align: center
  }

  .lastSlide {
    position: absolute;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    color: #000;
    background-color: #fff;
    display: inline-block;
    width: 80%;
    height: 80%;
    margin: auto;
    z-index: 99
  }

  .boxRatingGlr {
    position: relative;
    width: 100%;
    height: 100%
  }

  .boxRatingGlr .hd {
    text-align: center;
    position: absolute;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    width: 600px;
    height: 200px;
    margin: auto
  }

  .boxRatingGlr .hd span {
    margin-bottom: 20px;
    display: inline-block;
    font-size: 24px
  }

  .boxRatingGlr .hd b {
    font-style: normal;
    margin-top: 15px;
    color: #05a245;
    display: inline-block;
    font-size: 16px
  }

  .boxRatingGlr .hd .rate-btn {
    border: 1px solid #ddd;
    border-radius: 4px;
    width: 198px;
    display: inline-block;
    padding: 12px 0 8px 0;
    font-size: 20px;
    color: #288ad6;
    background: #fff;
    margin-left: 10px
  }

  .iconcom-likeGlr {
    background-position: -220px 0;
    width: 20px;
    height: 22px;
    margin: 0 5px
  }

  .iconcom-unlikeGlr {
    background-position: -191px -23px;
    width: 20px;
    height: 22px;
    margin: 0 5px
  }

  .wrap_rtglr {
    overflow: hidden;
    position: fixed;
    left: 0;
    right: 0;
    bottom: 0;
    height: 115vh;
    background: rgba(0, 0, 0, .5);
    z-index: 999999
  }

  .wrap_rtglr .pop {
    display: block;
    overflow: hidden;
    position: relative;
    width: 100%;
    max-width: 600px;
    margin: auto;
    background: #fff;
    margin-top: 15%;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px
  }

  .wrap_rtglr .pop .hdpop {
    background-color: #ffc801;
    text-align: center;
    padding: 10px 0;
    font-weight: bold
  }

  .wrap_rtglr .pop .hdpop .closehd {
    float: right;
    margin-right: 10px
  }

  .wrap_rtglr .bifRtCt {
    background-color: #fff;
    margin: 0
  }

  .wrap_rtglr .bifRtCt:before {
    display: none
  }

  .rtSuccess {
    color: #05a245 !important
  }

  .liveevent {
    position: relative;
    display: block;
    padding: 10px;
    padding-left: 35px;
    color: #f33;
    border-radius: 3px 3px 0 0;
    max-width: 50%;
    margin-left: 10px;
    margin-bottom: 15px
  }

  #dot {
    width: 10px;
    height: 10px;
    background-color: #f33;
    border-radius: 100%;
    position: absolute;
    left: 10px;
    top: 50%;
    margin-top: -5px;
    display: block
  }

  #dot .ping {
    border: 1px solid #f33;
    width: 10px;
    height: 10px;
    opacity: 1;
    background-color: rgba(238, 46, 36, .2);
    border-radius: 100%;
    -webkit-animation-duration: 1.25s;
    animation-duration: 1.25s;
    -webkit-animation-name: sonar;
    animation-name: sonar;
    -webkit-animation-iteration-count: infinite;
    animation-iteration-count: infinite;
    -webkit-animation-timing-function: linear;
    animation-timing-function: linear;
    display: block;
    margin: -1px 0 0 -1px
  }

  .liveevent .text {
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis;
    display: inline;
    color: #f33;
    text-decoration: underline
  }

  .iconcom-4g {
    width: 13px;
    height: 32px;
    background-position: -249px -33px
  }

  @-webkit-keyframes travel {
    0% {
      -webkit-transform: translateX(-900px);
      transform: translateX(-900px)
    }

    100% {
      -webkit-transform: translateX(0);
      transform: translateX(0)
    }
  }

  @keyframes travel {
    0% {
      -webkit-transform: translateX(-900px);
      transform: translateX(-900px)
    }

    100% {
      -webkit-transform: translateX(0);
      transform: translateX(0)
    }
  }

  @-webkit-keyframes sonar {
    0% {
      opacity: 1;
      -webkit-transform: scale(1);
      transform: scale(1)
    }

    100% {
      -webkit-transform: scale(4);
      transform: scale(4);
      opacity: 0
    }
  }

  @keyframes sonar {
    0% {
      opacity: 1;
      -webkit-transform: scale(1);
      transform: scale(1)
    }

    100% {
      -webkit-transform: scale(4);
      transform: scale(4);
      opacity: 0
    }
  }

  /* 01:50:02 11/02/2020 */
  .cpNoel {
    background: url(/Content/desktop/images/V4/game/noel/teaser.png?v=5);
    text-align: center;
    margin: 0 10px 10px;
    height: 80px;
    position: relative;
    background-repeat: no-repeat
  }

  .cpNoelKm {
    background: url(/Content/desktop/images/V4/game/noel/teaser2.png?v=5) no-repeat;
    margin: 10px auto;
    max-width: 600px
  }

  .cpNoel .time {
    color: #fff;
    position: absolute;
    top: 10px;
    right: 5px;
    font-size: 14px
  }

  .cpNoel .xct {
    color: #fcef02;
    position: absolute;
    bottom: 12px;
    right: 5px;
    text-decoration: underline
  }

  .cpNoel .xct2 {
    color: #288ad6;
    position: absolute;
    bottom: 2px;
    left: 93px;
    text-decoration: underline;
    font-size: 13px
  }

  .cpNoelKm .xct2 {
    color: #288ad6;
    position: absolute;
    top: 18px;
    right: 47px;
    bottom: unset;
    left: unset;
    text-decoration: underline;
    font-size: 13px
  }

  #loading-ncd {
    position: absolute;
    z-index: 999;
    background: rgba(0, 0, 0, .6);
    width: 100%;
    height: 100%;
    left: 0;
    top: 0;
    display: none
  }

  #loading-ncd span {
    color: #fff;
    height: 40px;
    line-height: 40px;
    width: 100%;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    text-align: center
  }

  .cpit {
    background: url(/Content/desktop/images/V4/game/noel/bnpk.png?v=5);
    background-repeat: no-repeat;
    background-size: contain
  }

  .cpit.cpNoelKm {
    background: url(/Content/desktop/images/V4/game/noel/bnpk.png?v=5)
  }

  .cpit a.xctF {
    width: 100%;
    height: 100%;
    cursor: pointer;
    opacity: 0;
    display: block
  }

  @media screen and (max-width:640px) {

    .cpNoel,
    .cpNoelKm {
      background: url(/Content/desktop/images/V4/game/noel/teasermb.png?v=5);
      background-size: 100%;
      box-sizing: border-box;
      background-repeat: no-repeat;
      margin: 5px 0 10px;
      height: 140px
    }

    .cpNoel .xct2 {
      color: #288ad6;
      position: absolute;
      bottom: unset;
      left: unset;
      right: 5px;
      top: 18px;
      text-decoration: underline;
      font-size: 13px
    }

    .cpit,
    .cpit.cpNoelKm {
      background: url(/Content/desktop/images/V4/game/noel/tsxtmb.png?v=5);
      width: 100%;
      background-repeat: no-repeat;
      background-size: 100%
    }
  }

  @media screen and (max-width:414px) {

    .cpNoel,
    .cpNoelKm {
      height: 80px;
      font-size: 14px
    }

    .cpNoel .time {
      font-size: 14px
    }
  }

  @media screen and (max-width:384px) {

    .cpNoel,
    .cpNoelKm {
      height: 80px
    }

    .cpNoel .xct2 {
      font-size: 11px;
      bottom: 0
    }

    .cpit,
    .cpit.cpNoelKm {}
  }

  @media screen and (max-width:375px) {

    .cpNoel,
    .cpNoelKm {
      height: 75px
    }
  }

  @media screen and (max-width:360px) {

    .cpNoel,
    .cpNoelKm {
      height: 70px;
      font-size: 12.5px
    }

    .cpNoel .time {
      font-size: 12.5px
    }
  }

  @media screen and (max-width:320px) {

    .cpNoel,
    .cpNoelKm {
      height: 60px;
      font-size: 12px
    }

    .cpNoel .time {
      font-size: 12.5px
    }

    .cpNoel .xct2 {
      font-size: 10px
    }
  }

  /* 12:31:04 06/04/2020 */
  .quotation {
    padding: 0 10px 0 0;
    overflow: hidden
  }

  .boxdefault .quotation {
    padding-top: 10px
  }

  .quotation a {
    background: transparent url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAAcCAMAAABF0y+mAAAABGdBTUEAALGPC/xhBQAAAJxQTFRFAAAAVar/QJ/fM5ndMI/fMZPYL47ZLpLbLI3cKI3XKI7XK43YK4vYKYzZK4zYKIzXK4vXKIvXKYrYKIvXKYzWKYvYKYrWKIzXKYvYKYrYKIvXKYvWKYvXKYvWKYvXKYrWKIvXKYrXKIvXKIrXKYrWKYrWKYvWKIvXKYvWKIvXKIrXKIvXKYrXKYrWKYvWKIvXKYrWKIrXKIvXKIrW0vOk1AAAADN0Uk5TAAMIDxAaGxwdJj9BQlBUWVpydn+Jj5CSlZueqbS2uby/zdHY2uHi5Ofp6uvs7u/2+/3+vpCGkwAAAJ9JREFUKM+90rcOwkAQRdFHznEJBhswOZi49///jYYGe70FBbc90mhGGknN6ESmU9SUJGNxZo3UtiTjYaZxgm1rQVKRo+qVhS4EchZwFhg3GvjCOP4VvWO9GIYetNaD8H/0LuQ95asJt1wsHVgJjMqdXrrBDroCU987n2gmwWjtkOemLwkeMK2lK34Oh2XBvbCAbTnH9OLeyDPNj61cewNpky8snXdZDwAAAABJRU5ErkJggg==) no-repeat left center;
    background-size: 14px 14px;
    float: right;
    padding-left: 20px;
    color: #288ad6;
    font-size: 13px;
    font-weight: bold
  }

  .pop-quotation {
    position: fixed;
    width: 100%;
    height: 100vh;
    z-index: 999999;
    left: 0;
    top: 0;
    background: rgba(0, 0, 0, .75);
    display: none
  }

  .pop-quotation form,
  .pop-quotation .q-success {
    width: 90%;
    max-width: 500px;
    margin: 20px auto;
    background-color: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 20px 15px;
    position: relative
  }

  .pop-quotation form>* {
    display: block;
    margin-bottom: 15px
  }

  .pop-quotation a:hover {
    text-decoration: none !important
  }

  .pop-quotation form h3 {
    font-size: 20px;
    text-align: center
  }

  .pop-quotation form p {
    line-height: 1.6
  }

  .pop-quotation form div span {
    display: inline-block;
    vertical-align: top;
    margin-right: 20px;
    cursor: pointer
  }

  .pop-quotation form div span * {
    display: inline-block;
    vertical-align: middle;
    margin-right: 5px
  }

  .pop-quotation form div span i {
    width: 10px;
    height: 10px;
    padding: 3px;
    border: 1px solid #ccc;
    border-radius: 50%;
    margin-right: 10px
  }

  .pop-quotation form div span b {
    font-weight: normal;
    font-size: 15px
  }

  .pop-quotation form div span.active i:after {
    content: '';
    display: block;
    border-radius: 50%;
    background-color: #288ad6;
    height: 100%
  }

  .pop-quotation form strong {
    margin-bottom: 5px;
    font-size: 15px;
    padding: 0;
    text-transform: unset
  }

  .pop-quotation form div.inline {
    display: inline-block;
    vertical-align: top;
    width: 49%;
    margin-bottom: 10px
  }

  .pop-quotation form div em {
    color: #f01;
    display: block;
    margin-top: 5px;
    font-size: 13px;
    display: none
  }

  .pop-quotation form div.q-phone {
    margin-left: 1%
  }

  .pop-quotation form input {
    width: calc(96% - 2px);
    padding: 0 2%;
    height: 40px;
    line-height: 40px;
    border: 1px solid #ccc;
    border-radius: 4px
  }

  .pop-quotation form textarea {
    padding: 2%;
    width: calc(96% - 2px);
    border: 1px solid #ccc;
    border-radius: 4px;
    display: block
  }

  .pop-quotation form button {
    height: 40px;
    width: 200px;
    background-color: #288ad6;
    border: none;
    border-radius: 4px;
    color: #fff;
    font-size: 16px;
    text-align: center;
    line-height: 40px;
    margin: 0 auto 10px auto;
    text-transform: uppercase;
    cursor: pointer
  }

  .pop-quotation form span {
    text-align: center;
    color: #8c8c8c
  }

  .pop-quotation form div.error input,
  .pop-quotation div.error textarea {
    border-color: #f01
  }

  .pop-quotation form div.error em {
    display: block
  }

  .pop-quotation .q-success {
    max-width: 300px;
    display: none;
    margin-top: 10%
  }

  .pop-quotation .q-success h3 {
    display: block;
    color: #00af1d;
    font-size: 16px;
    text-align: center;
    font-weight: bold
  }

  .pop-quotation .q-success h3 i {
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px
  }

  .pop-quotation .q-success h3 i:after {
    content: '';
    display: block;
    width: 6px;
    height: 12px;
    border: solid #00af1d;
    border-width: 0 4px 4px 0;
    transform: rotate(45deg);
    background: none;
    margin: -7px 0 0 0;
    border-radius: 0
  }

  .pop-quotation .q-success p {
    line-height: 1.6;
    padding: 15px 0
  }

  .pop-quotation .q-success a:nth-child(4) {
    display: block;
    width: 120px;
    height: 35px;
    line-height: 35px;
    text-align: center;
    margin: auto;
    color: #228ad6;
    border: 1px solid #228ad6;
    border-radius: 4px;
    margin-bottom: 15px
  }

  .pop-quotation .q-success span {
    text-align: center;
    color: #8c8c8c;
    display: block;
    font-size: 13px
  }

  .pop-quotation .q-close {
    position: absolute;
    right: 10px;
    top: 6px;
    width: 20px;
    height: 20px;
    cursor: pointer;
    z-index: 999
  }

  .pop-quotation .q-close:before {
    content: "×";
    font-size: 32px;
    color: #999;
    line-height: 20px;
    text-align: center;
    width: 100%;
    height: 100%;
    font-family: Tahoma;
    display: block
  }

  .vipservice {
    margin-bottom: 10px !important
  }

  .area_promotion .vipservice {
    margin-bottom: 0 !important
  }

  .boxdefault .quotation {
    padding-top: 0
  }

  @media screen and (max-width:720px) {
    .pop-quotation form {
      max-height: 100%;
      overflow-x: hidden;
      overflow-y: scroll;
      -webkit-overflow-scrolling: touch;
      -ms-scroll-chaining: chained;
      margin-top: 0
    }

    .pop-quotation form div.inline {
      display: block;
      width: auto
    }

    .pop-quotation form div.q-phone {
      margin-left: 0
    }

    .area_promotion {
      padding-bottom: 5px
    }
  }

  /* 03:28:28 11/05/2020 */
  h1 {
    float: left;
    overflow: hidden;
    font-size: 24px;
    color: #333;
    line-height: 40px
  }

  .ratingresult {
    float: left;
    font-size: 14px;
    color: #288ad6;
    padding: 10px 10px 0 11px
  }

  .ratingresult span {
    display: inline-block;
    overflow: hidden;
    vertical-align: middle
  }

  .ratingresult a {
    color: #288ad6;
    display: inline-block;
    vertical-align: middle;
    padding-top: 2px;
    margin-left: 8px
  }

  .icontgdd-star {
    background-position: -310px -30px;
    width: 12px;
    height: 12px
  }

  .icontgdd-hstar {
    background-position: -423px -30px;
    width: 12px;
    height: 12px
  }

  .ratingresult span.star .icontgdd-star {
    background-position: -295px -30px
  }

  .likeshare {
    float: right;
    font-size: 14px;
    margin: 10px 0 0 0
  }

  .likeshare span {
    float: right
  }

  .rowdetail {
    display: block;
    border-top: 1px solid #e5e5e5;
    padding: 15px 0;
    margin-top: 5px;
    clear: both
  }

  .picture {
    float: left;
    overflow: hidden;
    width: 42%;
    position: relative
  }

  .picture img {
    display: block;
    height: auto;
    margin: auto;
    cursor: pointer;
    max-width: 100%
  }

  .picture .icon-position {
    position: relative
  }

  .picture img.icon-imgNew {
    position: absolute;
    right: 51px;
    bottom: 0;
    width: 100px;
    height: auto
  }

  .picture img.cate44 {
    right: 10px;
    bottom: 10px
  }

  .picture img.cate7077 {
    bottom: 10px
  }

  .picture>label:first-child {
    position: absolute;
    left: 0;
    top: 9px;
    background-color: #f9f9f9;
    padding: 10px 20px;
    z-index: 2
  }

  .colorandpic {
    display: block;
    position: relative;
    padding: 0 24px;
    margin: 15px 0 0 0
  }

  .colorandpic ul {
    display: block;
    overflow: visible;
    margin: auto;
    text-align: center;
    max-height: 98px
  }

  .colorandpic li {
    display: inline-block;
    vertical-align: top;
    text-align: center;
    overflow: hidden;
    font-size: 11px;
    color: #333;
    padding-bottom: 5px;
    line-height: normal;
    width: 60px
  }

  .colorandpic li div {
    display: block;
    width: 46px;
    height: 46px;
    border: 1px solid #dfdfdf;
    border-radius: 4px;
    padding: 6px;
    background: #fff;
    margin-bottom: 5px;
    cursor: pointer
  }

  .colorandpic li img {
    display: block;
    width: 40px;
    height: 40px;
    margin: auto;
    border-radius: 4px;
    margin-top: 3px
  }

  .colorandpic li img.lapglrimg {
    height: auto;
    margin-top: 10px
  }

  .colorandpic li.choosed div {
    border-color: #f89008;
    border-width: 2px
  }

  .icontgdd-box {
    background-position: -215px -50px;
    width: 30px;
    height: 30px;
    display: block;
    margin: 8px auto
  }

  .icontgdd-camera {
    background-position: -250px -50px;
    width: 25px;
    height: 23px;
    display: block;
    margin: 12px auto
  }

  .icontgdd-360 {
    background-position: -280px -50px;
    width: 39px;
    height: 22px;
    display: block;
    margin: 14px auto
  }

  .icontgdd-video {
    background-position: -325px -50px;
    width: 30px;
    height: 24px;
    display: block;
    margin: 11px auto
  }

  .wrap_thumb {
    display: block;
    position: relative;
    overflow: hidden
  }

  .colorandpic .prev,
  .colorandpic .next {
    position: absolute;
    top: 0;
    bottom: 0;
    width: 20px;
    background: #fff;
    cursor: pointer
  }

  .colorandpic .prev {
    left: 0;
    padding-top: 20px
  }

  .colorandpic .next {
    right: 0;
    padding-top: 20px
  }

  .ftAcc ul {
    max-height: 79px
  }

  .ftAcc li {
    margin: 5px 10px 0 0
  }

  .ftAcc li div {
    border: none;
    border-radius: 0;
    width: 60px;
    height: auto;
    padding: 0
  }

  .ftAcc li div.xtc {
    color: #288ad6;
    box-sizing: border-box;
    border: solid 1px #288ad6;
    width: auto;
    text-align: center;
    padding: 4px
  }

  .ftAcc li div.xtc span {
    vertical-align: -webkit-baseline-middle
  }

  .ftAcc li div img {
    width: auto;
    border-radius: 3px
  }

  .ftAccN li:nth-child(n+7) {
    display: none
  }

  .icontgdd-prevthumd {
    background-position: -180px -50px;
    width: 12px;
    height: 21px;
    margin-left: 5px
  }

  .icontgdd-nextthumd {
    background-position: -195px -50px;
    width: 12px;
    height: 21px;
    float: right
  }

  .price_sale {
    float: left;
    position: relative;
    width: 33%;
    margin: 0 1% 0 1%
  }

  .price_sale.notold {
    width: 40%;
    margin: 0 1% 0 5%
  }

  .price_sale.fashion {
    width: 38%;
    margin: 0;
    float: right
  }

  label.installment {
    background: #d0021b;
    position: relative;
    display: inline-block;
    font-size: 11px;
    color: #fff;
    font-weight: 600;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    padding: 0 5px 0 8px;
    margin: 0 0 5px 5px;
    height: 18px
  }

  .area_price {
    display: block;
    overflow: hidden;
    line-height: 20px;
    padding: 0 10px 10px
  }

  .area_price strong {
    display: inline-block;
    overflow: hidden;
    font-size: 24px;
    color: #e10c00;
    vertical-align: middle;
    margin-right: 10px
  }

  .area_price label {
    display: inline-block;
    position: relative;
    font-size: 11px;
    color: #fff;
    font-weight: 600;
    background: #fff;
    border-radius: 3px;
    padding: 0 5px 0 8px;
    margin: 0 0 5px 5px;
    height: 18px
  }

  .area_price label.installment {
    background: #f28902;
    margin: 0 0 0 5px
  }

  .area_price label.new {
    background: #3fb846
  }

  .area_price label.new:before {
    content: '';
    width: 0;
    height: 0;
    border-top: 9px solid transparent;
    border-bottom: 9px solid transparent;
    border-right: 7px solid #3fb846;
    position: absolute;
    top: 0;
    left: -6px
  }

  .area_price label.new::after {
    content: "•";
    color: #fff;
    display: inline-block;
    vertical-align: middle;
    margin-right: 5px;
    font-size: 16px;
    position: absolute;
    top: 1px;
    right: 85%
  }

  .area_price span {
    display: inline-block;
    font-size: 14px;
    color: #c1000c
  }

  .area_price span.hisprice {
    display: inline-block;
    vertical-align: middle;
    font-size: 18px;
    color: #999;
    text-decoration: line-through;
    margin-right: 10px
  }

  .area_promotion {
    display: block;
    overflow: hidden;
    border: 1px solid #ddd;
    border-radius: 4px;
    position: relative;
    margin: 5px 10px 12px;
    background: #fff;
    padding-bottom: 10px
  }

  .area_promotion strong {
    display: block;
    overflow: hidden;
    font-size: 15px;
    color: #333;
    padding: 15px 15px 10px 15px;
    text-transform: uppercase
  }

  .area_promotion.once.group strong {
    display: none
  }

  .area_promotion.onlyonlinepromo {
    border: none;
    margin: 0;
    padding-bottom: 0
  }

  .area_promotion.onlyonlinepromo strong {
    display: none
  }

  .area_promotion.once.zero.onlyonlinepromo {
    margin-bottom: 10px
  }

  .area_promotion span .sao {
    color: #d0021b;
    display: none
  }

  .area_promotion.zero span .sao {
    display: inline;
    font-weight: bold
  }

  .area_promotion .infopr span {
    display: block;
    overflow: hidden;
    font-size: 14px;
    color: #333;
    padding: 0 15px 5px 40px
  }

  .area_promotion .infopr span:before {
    content: '';
    margin-left: -20px;
    background: url(/Content/desktop/images/V4/game/check@2x.png);
    width: 14px;
    height: 14px;
    background-size: 14px 14px;
    margin-right: 0;
    float: left;
    margin-top: 2px
  }

  .area_promotion .infopr span label {
    color: #e10c00
  }

  .area_promotion .onlinepromo {
    border: #d0021b solid 1px;
    border-radius: 4px;
    padding: 20px 0 10px;
    position: relative;
    overflow: visible;
    margin: 20px 10px 0
  }

  .area_promotion .onlinepromo b {
    background: #ec1933;
    border-radius: 13px;
    color: #fff;
    font-size: 14px;
    font-weight: normal;
    position: absolute;
    top: -13px;
    left: 10px;
    vertical-align: middle;
    line-height: 26px;
    clear: both;
    padding: 0 15px 0 30px
  }

  .area_promotion .onlinepromo b:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/icon-qua-tang@2x.png);
    width: 16px;
    height: 15px;
    background-size: 16px 15px;
    float: left;
    margin: 4px 5px 0 -15px
  }

  .not-repay {
    margin-top: 5px;
    padding: 5px 10px;
    color: #d0021b;
    font-size: 14px
  }

  .area_promotion a {
    color: #288ad6
  }

  .area_promotion a:hover {
    text-decoration: underline
  }

  .area_promotion .pro-title {
    display: block;
    overflow: hidden;
    font-size: 15px;
    color: #333;
    padding: 10px 0 0 0;
    text-transform: uppercase;
    border-top: solid 1px #eee;
    margin: 10px
  }

  .area_promotion.once .pro-title {
    margin: 0 10px 10px 10px;
    border-top: 0
  }

  .area_promotion aside.box-AllImageSlide {
    display: block;
    overflow: hidden;
    margin-top: 10px
  }

  .area_promotion aside.box-AllImageSlide p {
    font-size: 12px;
    color: #666;
    padding-top: 10px;
    border-top: 1px dashed #c8c8c8;
    margin: 0 10px
  }

  .area_promotion aside.box-AllImageSlide .pro-img {
    display: block;
    overflow: hidden;
    width: calc(100% - 20px);
    white-space: nowrap;
    padding: 10px 10px 0
  }

  .area_promotion aside.box-AllImageSlide li {
    display: inline-block;
    margin-right: 10px;
    width: calc(25% - 12px);
    float: left;
    margin-bottom: 0 !important
  }

  .area_promotion aside.box-AllImageSlide .pro-img a {
    display: inline-block;
    margin: 0 10px 10px 0;
    width: calc(45%);
    float: left;
    cursor: pointer
  }

  .area_promotion aside.box-AllImageSlide .pro-img.isthree a {
    width: calc(30%)
  }

  .area_promotion aside.box-AllImageSlide .pro-img a img {
    display: block;
    width: 50px;
    height: 50px;
    margin: auto;
    float: left;
    margin-right: 5px
  }

  .area_promotion aside.box-AllImageSlide .pro-img a h3 {
    overflow: hidden;
    font-size: 11px;
    color: #288ad6;
    white-space: pre-line;
    text-overflow: ellipsis;
    line-height: 13px;
    margin-top: 5px;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    max-height: 40px
  }

  .area_promotion aside.box-AllImageSlide .pro-img.isthree a h3 {
    white-space: normal
  }

  .policy {
    display: block;
    overflow: hidden;
    border: 1px solid #ddd;
    border-radius: 3px;
    padding-bottom: 5px;
    margin-bottom: 10px;
    padding-top: 10px
  }

  .policy li {
    display: block;
    overflow: hidden;
    padding: 5px 0 5px 28px;
    font-size: 14px;
    color: #333;
    line-height: 20px;
    margin: 0 10px;
    border-bottom: solid 1px #f0f0f0;
    position: relative
  }

  .policy li:first-child {
    padding-top: 0;
    min-height: 30px
  }

  .policy li a {
    color: #288ad6
  }

  .policy li a:hover {
    text-decoration: underline
  }

  .policy li b,
  .policy li strong {
    font-weight: normal
  }

  .policy li:last-child {
    border-bottom: none
  }

  .policy.nobefore li:last-child:before {
    display: none
  }

  .policy li.timeship {
    display: none
  }

  .policy li .icon-poltick {
    content: '';
    background: url(/Content/desktop/images/V4/game/1-doi-1@2x.png) 0 0 no-repeat;
    width: 16px;
    height: 18px;
    background-size: 16px 18px;
    position: absolute;
    display: block;
    top: 8px;
    left: 3px
  }

  .policy .inpr:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/trong-hop-co@2x.png) 0 0 no-repeat;
    width: 19px;
    height: 16px;
    background-size: 19px 16px;
    position: absolute;
    display: block;
    top: 4px;
    left: 0
  }

  .policy .wrpr:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/bao-hanh-chinh-hang@2x.png) 2px 0 no-repeat;
    width: 19px;
    height: 23px;
    background-size: 16px 23px;
    position: absolute;
    display: block;
    top: 4px;
    left: 0
  }

  .policy .shpr:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/giao-hang@2x.png) 2px 0 no-repeat;
    width: 24px;
    height: 16px;
    background-size: 22px 16px;
    position: absolute;
    display: block;
    top: 8px;
    left: -3px
  }

  .policy .shpr span strong {
    color: #e10c00;
    font-weight: bold
  }

  .policy .shpr span strong.f {
    color: #e10c00;
    font-weight: normal
  }

  .policy .chpr:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/1-doi-1@2x.png) 0 0 no-repeat;
    width: 18px;
    height: 20px;
    background-size: 18px 20px;
    position: absolute;
    display: block;
    top: 8px;
    left: 0
  }

  .policy .ghOLpr:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/giao-hang-online@2x.png) 0 0 no-repeat;
    width: 30px;
    height: 20px;
    background-size: 25px 15px;
    position: absolute;
    display: block;
    top: 8px;
    left: -2px
  }

  .policy .ghOLpr span strong {
    font-weight: bold
  }

  .policy .tnpr:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/trai-nghiem@2x.png) 0 0 no-repeat;
    width: 30px;
    height: 20px;
    background-size: 23px 17px;
    position: absolute;
    display: block;
    top: 8px;
    left: 0
  }

  .policy li.csw {
    padding: 5px
  }

  .policy li.csw p {
    border-bottom: solid 1px #f0f0f0;
    padding: 10px 0
  }

  .policy li.csw p:first-child {
    padding: 0 0 10px
  }

  .policy li.csw p:last-child {
    border-bottom: none;
    padding: 10px 0 0
  }

  .policy li.csw:before {
    background: unset;
    content: unset
  }

  .plcAcc {
    display: block;
    overflow: hidden;
    margin: 10px;
    border-top: 1px solid #eee
  }

  .plcAcc li {
    display: block;
    overflow: hidden;
    padding: 10px 10px 0 22px;
    font-size: 14px;
    color: #333
  }

  .plcAcc li::before {
    content: "•";
    color: #b7b7b7;
    display: inline-block;
    vertical-align: middle;
    font-size: 15px;
    margin-right: 6px;
    margin-left: -12px
  }

  .plcAcc li a {
    color: #288ad6
  }

  .olol li.timeship {
    display: none
  }

  .area_order {
    display: block;
    overflow: hidden;
    margin: 10px
  }

  .area_order .buy_now {
    display: block;
    overflow: hidden;
    padding: 7px 0;
    border-radius: 4px;
    font-size: 16px;
    line-height: normal;
    text-transform: uppercase;
    color: #fff;
    text-align: center;
    background: #fd6e1d;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
    background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
    background: -moz-linear-gradient(top, #f59000, #fd6e1d);
    background: -ms-linear-gradient(top, #f59000, #fd6e1d);
    background: -o-linear-gradient(top, #f59000, #fd6e1d)
  }

  .area_order .buy_now.near2020 {
    padding: 15px 0
  }

  .area_order span {
    display: block;
    font-size: 13px;
    color: #fff;
    text-transform: none;
    padding-top: 3px
  }

  .area_order .buy_ins {
    line-height: normal;
    display: block;
    padding: 9px 0;
    text-align: center;
    margin: 10px 0 0;
    background: #288ad6;
    color: #fff;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    font-size: 16px;
    text-transform: uppercase
  }

  .area_order .buy_repay {
    line-height: normal;
    display: block;
    padding: 7px 0;
    text-align: center;
    margin: 10px 0 0;
    background: #288ad6;
    color: #fff;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    font-size: 15px;
    text-transform: uppercase;
    width: 48.5%;
    float: left
  }

  .area_order .buy_repay.full {
    width: 100%
  }

  .area_order .buy_repay.s {
    float: right
  }

  .area_order .btnTet {
    width: 100%
  }

  .area_order .promoStore {
    border: 1px solid #ddd;
    padding: 10px;
    background-color: #faebd7;
    margin-bottom: 10px
  }

  .area_order .promoStore h3 {
    font-size: 16px;
    text-transform: uppercase;
    color: #333;
    font-weight: 600
  }

  .area_order .promoStore p {
    font-size: 14px;
    line-height: 22px
  }

  .area_order .promoStore strong {
    color: #e10c00;
    font-size: 16px
  }

  .area_order .promoStore .xemtl {
    color: #288ad6
  }

  .area_order .promoStore .xemtl:after {
    content: '';
    width: 0;
    height: 0;
    border-top: 5px solid #288ad6;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    display: inline-block;
    vertical-align: middle;
    margin-left: 5px
  }

  .area_order .promoStore .box-Xemtl li {
    display: block;
    overflow: hidden;
    padding: 10px 10px 0 22px;
    font-size: 14px;
    color: #333
  }

  .area_order .promoStore .box-Xemtl {
    display: none
  }

  .area_order .promoStore .box-Xemtl li::before {
    content: "•";
    color: #b7b7b7;
    display: inline-block;
    vertical-align: middle;
    font-size: 15px;
    margin-right: 6px;
    margin-left: -12px
  }

  .area_order .promoStore .buy_promo {
    margin: 8px 0;
    display: block;
    overflow: hidden;
    padding: 16px 0;
    border-radius: 4px;
    font-size: 16px;
    line-height: normal;
    text-transform: uppercase;
    color: #fff;
    text-align: center;
    background-image: linear-gradient(-180deg, #e52025 2%, #d81116 96%)
  }

  .detailpay {
    padding: 0 0 10px 0;
    border-bottom: 1px solid #eee;
    margin: 10px
  }

  .detailpay a {
    color: #288ad6
  }

  .detailpay .pitm {
    color: #e10c00
  }

  .detailpay ul {
    list-style: none;
    margin-left: 0
  }

  .detailpay ul li {
    padding: 6px 0 0 0;
    list-style: none;
    display: block
  }

  .detailpay ul li:before {
    content: "•";
    color: #c3c3c3;
    padding-right: 6px;
    font-size: 15px
  }

  .callorder {
    display: block;
    overflow: hidden;
    padding: 0 10px;
    font-size: 14px;
    color: #333;
    margin-top: -10px
  }

  .callorder .ct {
    padding-bottom: 5px;
    padding-top: 5px;
    margin-top: 8px;
    text-align: center
  }

  .callorder span {
    display: inline-block;
    padding: 5px 0 0
  }

  .callorder a {
    color: #288ad6
  }

  .iconshop-local {
    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAAwAAAAPCAYAAADQ4S5JAAAABGdBTUEAALGPC/xhBQAAAhhJREFUKBV9UV1Ik2EUPufdpmmFmlAm2Shx7XVFiwiCCIx+yLopqDCoLosgioZbtxIE4ZSoKBDqJgic3kQ33gjSRdpFga3m943oZ91IREIu3ZZzp+d8sOoiOi8v73vOeZ7zy/SX2OTMUag9QmxJcAy9ZfE9duKh8SqM9RO99bGxVC6mROQQEReJKcskK0FsJxEG6EmA15xJx1sWzMkR8ZWWCk9F6AA8N5qbea0bt1En3tnhN4EgwCkhOrZEc6MIyBwecM5TRYaYzDUnEe6vptZXg42e4mWU+ggBzyLgabZJZ5JINmwN2k3qrBJ23HVbC0UZa/Kt2j1PVFcp52cRf8IgXRTtTVbBO4ck0DUh/mKhMgzy8FSsrZCJtc2hrwyLRA2MuKwvdd95V7v43Xn95aWbgpp3esM31a6CAdThGgWmiWVvZERqxi53lMTPFzGZLca/GjUzCiCK3H6/EYwQJpc2SPUADbVIzu1Tpxuzz9btslGvDOh9IqZS+nkPOTws6yTe5NxxRO3CFB6amtrrmSvtn5UcGcxuryxXktjhQd2Fk+g87i1u2/1cU/nHwnPktwpET19RTQCZGz2N+EV9Q8P+VxdaFz2CGu3AhyBJaQrLWa/6H+Es1dMe95L9pjZvOvpxejfnjPiOIHpedRU0PbsiQIerYLX9JqiSSYSm8ZxA2jLQ88aY7umr9pP6/iu2f+ZcZNDd9y/QL1dj15KTio7AAAAAAElFTkSuQmCC');
    background-repeat: no-repeat;
    display: inline-block;
    line-height: 30px;
    vertical-align: middle;
    background-position: 0 0;
    width: 13px;
    height: 16px;
    margin-right: 5px;
    margin-top: -3px
  }

  .checkexist {
    background: #fff;
    position: relative
  }

  .checkexist .layerstore {
    position: absolute;
    display: none;
    width: 280px;
    left: -31px;
    padding: 10px;
    background: #fff;
    border: 1px solid #ccc;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    z-index: 9;
    box-shadow: 0 3px 10px 0 rgba(0, 0, 0, .3)
  }

  .checkexist .layerstore:after,
  .checkexist .layerstore:before {
    top: -20px;
    left: 35px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none
  }

  .checkexist .layerstore:before {
    border-color: rgba(238, 238, 238, 0);
    border-bottom-color: #fff;
    border-width: 11px;
    margin-left: -11px;
    z-index: 1
  }

  .checkexist .layerstore:after {
    border-color: rgba(255, 255, 255, 0);
    border-bottom-color: #dfdfdf;
    border-width: 10px;
    margin-left: -10px
  }

  .checkexist strong {
    display: block;
    font-size: 14px;
    color: #288ad6;
    padding: 5px 0 12px 0;
    font-weight: normal;
    cursor: pointer
  }

  .checkexist .listmarket strong {
    color: #333
  }

  .checkexist .scroll {
    display: block;
    overflow-y: auto;
    overflow-x: hidden;
    max-height: 160px
  }

  .checkexist aside {
    float: left;
    width: 50%
  }

  .listmarket li h3.offStoreCorona b {
    color: #d0021b
  }

  .listmarket li h3.offStoreCorona label {
    display: none
  }

  .listcity .scroll {
    max-height: 250px
  }

  .listdist .scroll {
    max-height: 200px
  }

  .scroll::-webkit-scrollbar-track {
    background-color: #fff
  }

  .scroll::-webkit-scrollbar {
    width: 3px;
    background-color: #fff
  }

  .scroll::-webkit-scrollbar-thumb {
    background-color: #f0f0f0
  }

  .city {
    display: block;
    position: relative;
    border: 1px solid #d9d9d9;
    background: #fff;
    border-radius: 3px;
    line-height: 38px;
    font-size: 14px;
    color: #333;
    padding: 0 0 0 10px;
    margin-bottom: 10px;
    cursor: pointer
  }

  .city:after {
    content: '';
    width: 0;
    right: 0;
    border-top: 6px solid #999;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    display: inline-block;
    vertical-align: middle;
    margin: 16px 5px 0 0;
    float: right
  }

  .listcity {
    display: none;
    overflow: visible;
    position: absolute;
    top: 60px;
    left: 0;
    right: 0;
    z-index: 100;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding-bottom: 10px
  }

  .listcity:before,
  .listcity:after {
    content: '';
    position: absolute;
    bottom: 100%;
    left: 40px;
    width: 0;
    height: 0;
    border-bottom: 10px solid #ccc;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent
  }

  .listcity:after {
    border-width: 9px;
    margin-left: 1px;
    border-bottom-color: #fff
  }

  .listcity a {
    display: block;
    padding: 10px 10px 0;
    font-size: 14px;
    color: #288ad6;
    cursor: pointer
  }

  .dist {
    display: block;
    position: relative;
    border: 1px solid #d9d9d9;
    background: #fff;
    border-radius: 3px;
    line-height: 38px;
    font-size: 14px;
    color: #333;
    padding: 0 0 0 10px;
    margin-bottom: 10px;
    cursor: pointer
  }

  .dist:after {
    content: '';
    width: 0;
    right: 0;
    border-top: 6px solid #999;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    display: inline-block;
    vertical-align: middle;
    margin: 16px 5px 0 0;
    float: right
  }

  .listdist {
    display: none;
    overflow: visible;
    position: absolute;
    top: 110px;
    left: 0;
    right: 0;
    z-index: 100;
    background: #fff;
    border: 1px solid #ccc;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    padding-bottom: 10px
  }

  .listdist:before,
  .listdist:after {
    content: '';
    position: absolute;
    bottom: 100%;
    left: 50px;
    width: 0;
    height: 0;
    border-bottom: 10px solid #ccc;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent
  }

  .listdist:after {
    border-width: 9px;
    margin-left: 1px;
    border-bottom-color: #fff
  }

  .listdist a {
    display: block;
    padding: 10px 0 0 10px;
    font-size: 14px;
    color: #288ad6;
    overflow: hidden;
    white-space: nowrap;
    text-overflow: ellipsis;
    cursor: pointer
  }

  .searchlocal {
    display: block;
    overflow: hidden;
    padding: 10px 10px 0
  }

  .searchlocal form {
    display: block;
    border: 1px solid #d9d9d9;
    border-radius: 4px;
    background: #fff;
    height: 34px;
    position: relative
  }

  .searchlocal input {
    display: block;
    border: 0;
    background: #fff;
    padding: 5px;
    height: 24px;
    border-radius: 4px;
    width: 90%
  }

  .searchlocal .submit {
    position: absolute;
    top: 0;
    right: 0;
    padding: 8px 10px;
    background: #fff;
    height: 16px;
    border-radius: 0 3px 3px 0;
    border: 0;
    height: 34px
  }

  .resultcheck {
    display: block;
    overflow: hidden;
    border-top: 1px solid #e5e5e5;
    clear: both;
    padding-top: 10px
  }

  .listmarket {
    display: block;
    overflow: hidden;
    border-bottom: 1px solid #eee
  }

  .listmarket .listst {
    max-height: 380px;
    overflow-x: hidden;
    overflow-y: auto
  }

  .listmarket li {
    display: block;
    overflow: hidden;
    font-size: 14px;
    color: #333;
    padding: 0 0 10px 0
  }

  .listmarket li.newstore {
    color: #139f1a;
    padding-top: 10px;
    border-top: 1px solid #ddd
  }

  .listmarket li.oldstore {
    color: #d0021b
  }

  .listmarket li i {
    display: none
  }

  .listmarket li.none {
    display: none
  }

  .listmarket li a {
    color: #288ad6
  }

  .listmarket li span {
    color: #288ad6;
    font-size: 12px;
    cursor: pointer
  }

  .listmarket li span.km {
    color: #333
  }

  .listmarket li .two-7date b {
    color: #d0021b
  }

  .viewmarket {
    display: block;
    overflow: hidden;
    position: relative;
    line-height: 30px;
    font-size: 14px;
    color: #288ad6;
    cursor: pointer
  }

  .viewmarket:after {
    content: '';
    width: 0;
    right: 0;
    border-top: 6px solid #288ad6;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    display: inline-block;
    vertical-align: middle;
    margin: -2px 0 0 5px
  }

  .icontgdd-search,
  .iconmobile-search {
    background-position: -355px -30px;
    width: 16px;
    height: 16px
  }

  .option-repay,
  .option-shiper {
    margin: 10px;
    cursor: pointer
  }

  .active .iconmobile-uncheck {
    background-position: -165px -30px
  }

  .opacity01 {
    opacity: .1;
    pointer-events: none
  }

  .iconmobile-uncheck {
    background-position: -145px -30px;
    width: 16px;
    height: 16px;
    display: inline-block;
    vertical-align: sub;
    margin-right: 5px
  }

  .choosecolor {
    display: block;
    position: relative;
    border: 1px solid #dfdfdf;
    background: #fff;
    border-radius: 3px;
    line-height: 38px;
    font-size: 14px;
    color: #333;
    padding: 0 0 0 10px;
    margin: 10px 0;
    cursor: pointer
  }

  .choosecolor span {
    display: block;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap
  }

  .choosecolor:after {
    content: '';
    width: 0;
    right: 0;
    border-top: 6px solid #999;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    display: inline-block;
    vertical-align: middle;
    margin: 13px 5px 0 0;
    float: right;
    position: absolute;
    top: 0
  }

  .listcolor {
    display: none;
    overflow: visible;
    position: absolute;
    top: 43px;
    left: 0;
    right: 0;
    z-index: 100;
    background: #fff;
    border: 1px solid #d9d9d9;
    border-radius: 4px;
    box-shadow: 0 5px 5px 0 rgba(0, 0, 0, .1)
  }

  .listcolor:before,
  .listcolor:after {
    content: '';
    position: absolute;
    bottom: 100%;
    left: 50px;
    width: 0;
    height: 0;
    border-bottom: 10px solid #ccc;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent
  }

  .listcolor:after {
    border-width: 9px;
    margin-left: 1px;
    border-bottom-color: #fff
  }

  .listcolor a {
    display: block;
    overflow: hidden;
    color: #333;
    padding: 5px;
    cursor: pointer
  }

  .listcolor a div {
    width: 48px;
    height: 48px;
    background: #fff;
    border: 1px solid #e4e4e4;
    border-radius: 4px;
    display: inline-block;
    vertical-align: middle;
    margin-right: 10px
  }

  .listcolor a img {
    width: 40px;
    height: 40px;
    margin: 4px auto 0;
    display: block
  }

  .listcolor a:hover {
    background: #f8f8f8
  }

  .viewold {
    display: block;
    overflow: hidden;
    font-size: 14px;
    color: #288ad6;
    border-radius: 3px
  }

  .viewold div {
    display: block;
    overflow: hidden;
    color: #333;
    margin-top: 3px
  }

  .viewold div span {
    display: block;
    line-height: 22px
  }

  .viewold div span strong {
    color: #e10c00
  }

  .viewold div label.installment {
    position: absolute;
    right: 10px;
    bottom: 5px
  }

  .characteristics {
    display: block;
    overflow: hidden;
    position: relative;
    padding-bottom: 20px;
    cursor: pointer
  }

  .characteristics h4,
  .characteristics h3,
  .characteristics h2 {
    display: block;
    line-height: 1.3em;
    font-size: 20px;
    color: #333;
    margin-bottom: 10px
  }

  .owl-detail {
    display: block;
    overflow: hidden;
    top: 1px
  }

  #owl-detail {
    margin-bottom: 0
  }

  #owl-detail .item img {
    display: block;
    width: 100%;
    height: auto
  }

  #owl-detail .item img.iYt {
    position: absolute;
    width: auto;
    margin: auto;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0
  }

  #owl-detail .owl-controls {
    display: block;
    z-index: 10
  }

  #owl-detail .owl-controls .owl-page span {
    width: 8px;
    height: 8px;
    border: 1px solid #bfbfbf;
    background: none
  }

  #owl-detail .owl-controls .owl-page.active span {
    background: #f28c31;
    border: 1px solid #f28c31
  }

  #owl-detail .item {
    display: none;
    position: relative
  }

  #owl-detail .item:first-child {
    display: block
  }

  #owl-detail .item a.slLnk {
    position: absolute;
    bottom: 5px;
    right: 5px;
    color: #288ad6;
    padding: 4px 8px;
    background: rgba(255, 255, 255, .9);
    border-radius: 3px
  }

  #owl-detail.owl-theme .item:first-child {
    display: block
  }

  #owl-detail .owl-pagination {
    margin-top: 5px
  }

  #owl-detail .owl-buttons {
    opacity: 0
  }

  #owl-detail .owl-buttons .owl-prev {
    float: left;
    background: url(https://cdn.thegioididong.com/v2015/Content/desktop/images/V4/icondesktop@1x.png) no-repeat;
    background-position: -130px -50px;
    width: 22px;
    height: 40px;
    margin-left: 5px;
    position: absolute;
    top: 45%;
    left: 0
  }

  #owl-detail .owl-buttons .owl-next {
    float: right;
    background: url(https://cdn.thegioididong.com/v2015/Content/desktop/images/V4/icondesktop@1x.png) no-repeat;
    background-position: -155px -50px;
    width: 22px;
    height: 40px;
    margin-right: 5px;
    position: absolute;
    top: 45%;
    right: 0
  }

  .box_content {
    display: block;
    overflow: hidden;
    border-top: 1px solid #e4e4e4;
    margin-top: 15px
  }

  .left_content {
    float: left;
    width: 65%;
    overflow: hidden;
    position: relative;
    margin: 20px 0
  }

  article {
    display: block;
    font-size: 16px;
    color: #333;
    line-height: 1.5;
    margin-top: 15px;
    max-width: 750px;
    overflow: hidden
  }

  article.area_articleFull {
    overflow: visible
  }

  article h4 {
    display: block;
    overflow: hidden;
    line-height: 1.3em;
    font-size: 18px;
    color: #666;
    margin-bottom: 15px;
    font-weight: lighter
  }

  article img {
    display: block;
    max-width: 100%;
    height: auto;
    max-height: 584px;
    margin: 10px auto
  }

  article p {
    display: block;
    margin: 10px 0
  }

  article p i {
    margin-bottom: 20px;
    display: block;
    text-align: center;
    font-size: 14px;
    color: #666
  }

  article p i a {
    display: inline
  }

  article div.video {
    max-width: 100%;
    display: block;
    margin: 0 auto
  }

  article em {
    display: block;
    overflow: hidden;
    font-size: 13px;
    color: #666;
    text-align: center
  }

  article h2,
  article h3 {
    display: block;
    overflow: hidden;
    font-size: 20px;
    color: #333;
    margin-bottom: 10px;
    line-height: 1.3em;
    font-weight: bold
  }

  article h3 {
    margin-top: 30px;
    font-size: 20px
  }

  article h2 a,
  article h3 a {
    font-weight: bold;
    font-size: 20px
  }

  article a {
    color: #50a8e3
  }

  .readmore {
    width: 90px;
    display: block;
    overflow: hidden;
    position: relative;
    line-height: 40px;
    font-size: 14px;
    color: #288ad6;
    margin: 10px auto;
    cursor: pointer
  }

  .readmore:after {
    content: '';
    width: 0;
    right: 0;
    border-top: 6px solid #288ad6;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    display: inline-block;
    vertical-align: middle;
    margin: -2px 0 0 5px
  }

  .info_sp {
    display: block;
    vertical-align: middle;
    float: left;
    width: 35%
  }

  .info_sp>div {
    display: inline-block;
    width: 180px;
    vertical-align: top
  }

  .info_sp img {
    display: inline-block;
    width: 70px;
    height: auto;
    margin: 0 10px 0 0
  }

  .info_sp h3 {
    display: block;
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 5px;
    text-align: left;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    overflow: hidden;
    line-height: 1.3
  }

  .info_sp strong {
    display: block;
    color: #d0021b;
    font-size: 16px;
    text-align: left
  }

  .info_sp span {
    display: block;
    overflow: hidden;
    color: #c1000c;
    text-align: left
  }

  .info_acc .info_sp {
    width: 60%
  }

  .info_acc .info_sp h3 {
    font-size: 16px;
    margin-bottom: 6px
  }

  .bottom_order {
    padding-bottom: 15px;
    overflow: hidden
  }

  .bottom_order .area_order {
    display: block;
    vertical-align: middle;
    margin: 0;
    float: right;
    width: 64%;
    text-align: right
  }

  .bottom_order .area_order .buy_now {
    display: inline-block;
    vertical-align: top;
    padding: 15px 10px;
    margin-right: 20px;
    float: left;
    min-width: 135px !important;
    font-size: 12px
  }

  .bottom_order .area_order .buy_repay {
    padding: 15px 10px;
    width: 140px;
    float: left;
    margin-top: 0;
    margin-right: 10px;
    font-size: 12px
  }

  .bottom_order .area_order .buy_repay.s {
    margin-right: 0
  }

  .bottom_order .area_order .buy_now span,
  .bottom_order .area_order .buy_repay span {
    display: none
  }

  .bottom_order .area_order .b0pc {
    margin: 10px 10px 0 0
  }

  .bottom_order.info_acc .area_order {
    width: 39%
  }

  .compare {
    clear: both;
    display: block;
    overflow: hidden;
    border-top: 1px solid #e4e4e4;
    border-bottom: 1px solid #e4e4e4;
    padding: 10px 0 20px
  }

  .compare h4 {
    display: inline-block;
    overflow: hidden;
    vertical-align: middle;
    font-size: 20px;
    color: #333;
    padding: 10px 0
  }

  .compare div h3 {
    display: inline-block;
    overflow: hidden;
    vertical-align: middle;
    font-size: 20px;
    color: #333
  }

  .compare div a {
    display: inline-block;
    vertical-align: middle;
    color: #288ad6;
    margin-left: 10px
  }

  .compare div a:hover {
    text-decoration: underline
  }

  .compare .tcpr {
    padding: 10px 0;
    position: relative
  }

  .compare div.sggProd {
    display: inline-block;
    width: 300px;
    position: absolute;
    top: 8px;
    right: 0
  }

  .compare ul {
    display: block;
    overflow: hidden;
    margin-top: 10px
  }

  .compare li {
    float: left;
    overflow: hidden;
    width: 25%;
    padding: 0 5px;
    box-sizing: border-box
  }

  .compare li h3 {
    display: block;
    color: #333;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
    padding-top: 10px;
    font-weight: bold
  }

  .compare li .desc {
    color: #333;
    line-height: 1.5;
    padding: 10px 10px 0 0
  }

  .compare li .desc span {
    display: block
  }

  .compare li a {
    display: block;
    overflow: hidden;
    color: #288ad6
  }

  .compare li a img {
    width: 150px
  }

  .compare li a.compdetail {
    padding-top: 10px
  }

  .compare li a span.bdx {
    display: block;
    color: #333;
    padding-top: 10px;
    height: 12px
  }

  .compare li strong {
    display: block;
    color: #d0021b;
    padding: 10px 0 0 0
  }

  .compare li strong.gs {
    float: left;
    margin-left: 10px
  }

  .compare li strong.gg {
    color: #666;
    text-decoration: line-through;
    font-weight: normal
  }

  .compare li span.rtp {
    margin: 5px 0 0;
    display: block
  }

  .compare li .buyacc {
    width: 70px;
    padding: 6px 0;
    margin: 10px auto;
    border-radius: 4px;
    font-size: 14px;
    line-height: normal;
    text-transform: uppercase;
    text-align: center;
    color: #f76b1c;
    text-transform: uppercase;
    border: 1px solid #f76b1c;
    background: #fff;
    opacity: 1;
    display: none
  }

  .compare li:hover .buyacc {
    border: 1px solid #d97f00;
    color: #fff;
    background: #fd6e1d;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
    background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
    background: -moz-linear-gradient(top, #f59000, #fd6e1d);
    background: -ms-linear-gradient(top, #f59000, #fd6e1d);
    background: -o-linear-gradient(top, #f59000, #fd6e1d)
  }

  .right_content {
    float: right;
    width: 30%;
    overflow: visible;
    margin: 20px 0
  }

  .productstatus {
    display: block;
    line-height: 1.3em;
    font-size: 22px;
    color: #d0021b;
    font-weight: bold;
    text-transform: uppercase;
    margin-bottom: 10px
  }

  .tableparameter {
    display: block;
    overflow: visible
  }

  .tableparameter h4,
  .tableparameter h3,
  .tableparameter h2 {
    display: block;
    line-height: 1.3em;
    font-size: 20px;
    color: #333;
    margin-bottom: 0
  }

  .parameter {
    display: block;
    position: relative;
    overflow: hidden;
    background: #fff;
    padding-top: 10px
  }

  .parameter li {
    display: table;
    background: #fff;
    width: 100%;
    border-top: 1px solid #eee;
    padding: 5px 0
  }

  .parameter:not(.tableparameter_acc) li:nth-child(n+11) {
    display: none
  }

  .parameter li:last-child {
    border-bottom: 0
  }

  .parameter li:nth-child(n+10) {
    border-bottom: 0
  }

  .parameter li span {
    display: table-cell;
    width: 40%;
    vertical-align: top;
    padding: 5px 0;
    font-size: 14px;
    color: #666
  }

  .parameter li i {
    font-style: normal;
    display: inline
  }

  .parameter li i:last-child:after {
    content: none
  }

  .parameter li i:after {
    content: ', '
  }

  .parameter li div {
    display: table-cell;
    width: auto;
    vertical-align: top;
    padding: 6px 5px;
    font-size: 14px;
    color: #333
  }

  .parameter li div a {
    color: #288ad6
  }

  .parameter li div.isim {
    display: block;
    border-bottom: 1px solid #eee
  }

  .parameter li div.ibsim {
    display: block
  }

  .parameter li div.ibsim b.h {
    background: #e91935;
    color: #fff;
    padding: 3px 5px;
    border-radius: 3px;
    font-size: 10px;
    margin-right: 5px
  }

  .parameter li div.ibsim b.p {
    color: #d0021b
  }

  .viewparameterfull {
    display: block;
    width: 100%;
    padding: 6px 0;
    margin: 10px 0 0;
    cursor: pointer;
    text-align: center;
    font-size: 14px;
    background-color: #288ad6;
    color: #fff;
    border: 1px solid #288ad6;
    border-radius: 4px
  }

  .viewparameterfull:hover {
    color: #288ad6;
    background-color: #fff;
    border: 1px solid #288ad6
  }

  .newslist {
    display: block;
    overflow: hidden;
    margin: 20px 0 0
  }

  .newslist h4 {
    display: block;
    overflow: hidden;
    font-size: 20px;
    color: #333;
    line-height: 1.3em;
    padding-top: 20px;
    padding-bottom: 5px
  }

  .newslist li {
    display: block;
    overflow: hidden;
    padding: 8px 0
  }

  .newslist li img {
    float: left;
    width: 100px;
    height: 60px;
    margin-right: 10px
  }

  .newslist li a {
    display: block;
    overflow: hidden
  }

  .newslist li h3 {
    display: block;
    overflow: hidden;
    color: #333;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical
  }

  .newslist li span {
    display: block;
    overflow: hidden;
    font-size: 12px;
    color: #888
  }

  .newslist .viewall {
    padding: 8px 0 0 0;
    color: #288ad6;
    display: block
  }

  .accessories {
    display: block;
    overflow: hidden;
    margin: 30px 0 0
  }

  .accessories h3 {
    display: block;
    overflow: hidden;
    font-size: 20px;
    color: #333;
    line-height: 1.3em
  }

  .accessories li {
    display: block;
    overflow: hidden;
    padding: 10px 0
  }

  .accessories li img {
    float: left;
    width: 100px;
    height: AUTO;
    margin-right: 10px
  }

  .accessories li.laptop img {
    margin-bottom: 35px
  }

  .accessories li a {
    display: block;
    overflow: hidden
  }

  .accessories li a.buyacc {
    display: none
  }

  .accessories li h3 {
    display: block;
    overflow: hidden;
    color: #333;
    line-height: 1.3em;
    font-weight: bold;
    font-size: 14px
  }

  .accessories li strong {
    display: block;
    overflow: hidden;
    font-size: 14px;
    color: #d0021b;
    padding: 3px 0
  }

  .accessories li strong.gs {
    float: left;
    margin-right: 10px
  }

  .accessories li strong.gg {
    color: #666;
    text-decoration: line-through;
    font-weight: normal
  }

  .accessories li span {
    display: block;
    overflow: hidden;
    font-size: 13px;
    color: #666;
    line-height: 1.5
  }

  .accessories li .compdetail {
    display: block;
    color: #288ad6;
    padding: 5px 0;
    width: 100px;
    margin-left: 110px
  }

  .accessories li .compdetail:hover {
    text-decoration: underline
  }

  .accessories .viewall {
    padding: 8px 0 0 0;
    color: #288ad6;
    display: block
  }

  .accessories li label {
    display: inline-block;
    font-size: 11px;
    color: #fff;
    font-weight: 600;
    background: #3fb846;
    border-radius: 2px;
    padding: 0 5px;
    height: 18px
  }

  .accessories li label.per {
    background: #ee170b
  }

  .compare form {
    display: block;
    height: 36px;
    position: relative;
    border: 1px solid #e4e4e4;
    border-radius: 4px
  }

  .compare input {
    display: block;
    text-indent: 10px;
    width: 100%;
    border: 0;
    border-radius: 4px;
    padding: 8px 0;
    height: 20px
  }

  .compare button {
    position: absolute;
    top: 0;
    right: 2px;
    width: 36px;
    height: 35px;
    border: 0;
    background: #fff
  }

  .icontgdd-com {
    background-position: -325px -30px;
    width: 12px;
    height: 12px;
    margin-right: 5px
  }

  .hide,
  .none {
    display: none
  }

  .boxArticle .show-more::before {
    height: 55px;
    margin-top: -45px;
    content: -webkit-gradient(linear, 0% 100%, 0% 0%, from(#fff), color-stop(.2, #fff), to(rgba(255, 255, 255, 0)));
    display: block
  }

  .boxArticle .area_order .buy_now {
    margin-bottom: 0;
    min-width: 240px;
    box-sizing: border-box;
    margin-right: 10px
  }

  .boxArticle h3 {
    display: block;
    line-height: 1.3em;
    font-size: 20px;
    color: #333;
    margin-bottom: 0
  }

  .boxArticle .atcKit {
    width: 100%
  }

  .boxArticle article.area_article>table {
    border-collapse: collapse
  }

  .boxArticle article.area_article>table>thead {
    background-color: #ffad60
  }

  .wrap_comment {
    padding: 0;
    width: 100%
  }

  .sggProd .search-suggestion-wrapper .search-suggestion-list {
    background: #fff;
    border: 1px solid #ccc;
    font-size: 12px;
    line-height: 18px;
    top: -117px;
    left: -59px;
    z-index: 1000
  }

  .sggProd .search-suggestion-wrapper .search-suggestion-list li {
    height: 30px;
    margin: 0 !important;
    padding: 0 !important;
    text-align: left;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    display: inline-block !important;
    width: 250px
  }

  .sggProd .search-suggestion-wrapper .search-suggestion-list a {
    color: #333
  }

  .sggProd .search-suggestion-wrapper .search-suggestion-list li.selected,
  .sggProd .search-suggestion-wrapper .search-suggestion-list li:hover {
    background-color: #2889d6;
    color: #fff;
    width: 100%;
    text-decoration: unset
  }

  .sggProd .search-suggestion-wrapper .search-suggestion-list li a {
    display: inline-block;
    width: 100%;
    padding-left: 5px;
    vertical-align: -webkit-baseline-middle
  }

  .sggProd .search-suggestion-wrapper .search-suggestion-list li:hover a,
  .sggProd .search-suggestion-wrapper .search-suggestion-list li.selected a {
    color: #fff;
    vertical-align: -webkit-baseline-middle
  }

  .comdetail {
    margin-top: 25px;
    max-width: 750px
  }

  article .imgCprW {
    max-width: 640px;
    height: auto;
    margin: 0 auto
  }

  article .imgCprH {
    max-width: 437px
  }

  article div.video iframe {
    width: 100%;
    min-height: 422px
  }

  .twentytwenty-overlay {
    display: none
  }

  .caption_ps {
    position: absolute;
    z-index: 12;
    bottom: 0;
    left: 0;
    right: 0;
    font-family: 'Helvetica Neue', Arial, sans-serif;
    font-size: 14px;
    line-height: 1.5;
    color: #fff;
    text-align: center;
    background: rgba(0, 0, 0, .75);
    margin: 0 auto;
    min-width: 330px
  }

  .caption_ps.gender {
    bottom: inherit;
    top: 0;
    background: none;
    text-align: right
  }

  .caption_ps.gender label {
    display: inline-block;
    padding: 7px 20px;
    background-color: #eee;
    margin-right: 1px
  }

  #owl-detail .item p {
    display: block;
    overflow: hidden;
    padding: 10px 15px;
    background: #f2f2f2;
    font-size: 15px;
    color: #666
  }

  .wrap_comment .txtEditor,
  .wrap_comment .textarea {
    min-height: 70px
  }

  #owl-detail:hover .owl-buttons {
    display: block !important;
    opacity: 1;
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -o-transition: all .2s linear;
    -transition: all .2s linear
  }

  .fotorama--fullscreen .fotorama__fullscreen-icon {
    background-position: -68px 4px
  }

  .fotorama--fullscreen iframe {
    border: none
  }

  .giaohangnhanh {
    border: 1px dashed #f6a623;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    padding: 10px;
    display: block;
    overflow: hidden;
    margin: 10px 0
  }

  .giaohangnhanh span {
    display: block;
    padding: 5px 0 0 10px
  }

  .giaohangnhanh span:before {
    content: "•";
    color: #b7b7b7;
    display: inline-block;
    vertical-align: middle;
    font-size: 15px;
    margin-right: 6px;
    margin-left: -12px
  }

  .giaohangnhanh span strong {
    color: #d0021b
  }

  .notechoose {
    background: #fff46a;
    padding: 10px;
    margin: 10px;
    display: none;
    font-size: 12px;
    color: #333;
    text-align: left
  }

  .ratingbox .item {
    max-width: 550px;
    margin: 0 auto;
    text-align: center
  }

  .ratingbox .item p {
    font-size: 16px;
    font-weight: normal;
    font-style: italic;
    line-height: 34px
  }

  .ratingbox .item p>b {
    color: #ccc;
    margin-right: 5px;
    font-size: 30px;
    display: inline-block;
    vertical-align: top
  }

  .ratingbox .item .line {
    display: block;
    margin: 10px auto;
    width: 60px;
    height: 3px;
    background: #e06944
  }

  .ratingbox .item .info {
    color: #666;
    font-size: 12px;
    font-style: italic;
    display: block;
    text-align: left;
    margin-left: 31%
  }

  .ratingbox .item .info img {
    border: 1px solid #e06944;
    width: 30px;
    height: 30px;
    border-radius: 100%;
    float: left;
    margin: 0 5px
  }

  .ratingbox .item .sttB {
    font-size: 12px;
    color: #4abb4d;
    display: block
  }

  .ratingbox .item .sttB i {
    display: inline-block;
    margin-left: 0 !important
  }

  .ratingbox .owl-page span {
    width: 7px !important;
    height: 7px !important
  }

  .slideArt {
    margin: 0 0 10px;
    position: relative;
    cursor: pointer
  }

  .slideArt .owl-buttons {
    position: absolute;
    top: 45%;
    left: 0;
    right: 0;
    text-indent: -999999em;
    display: none !important;
    opacity: 0
  }

  .slideArt:hover .owl-buttons {
    display: block !important;
    opacity: 1;
    -webkit-transition: all .2s linear;
    -moz-transition: all .2s linear;
    -o-transition: all .2s linear;
    -transition: all .2s linear
  }

  .slideArt .owl-buttons .owl-prev {
    float: left;
    background: url(https://cdn.thegioididong.com/v2015/Content/desktop/images/V4/icondesktop@1x.png) no-repeat;
    background-position: -130px -50px;
    width: 22px;
    height: 40px;
    margin-left: 5px
  }

  .slideArt .owl-buttons .owl-next {
    float: right;
    background: url(https://cdn.thegioididong.com/v2015/Content/desktop/images/V4/icondesktop@1x.png) no-repeat;
    background-position: -155px -50px;
    width: 22px;
    height: 40px;
    margin-right: 5px
  }

  .slideArt .owl-controls .owl-page span {
    width: 8px;
    height: 8px;
    border: 1px solid #bfbfbf;
    background: none
  }

  .slideArt .item {
    text-align: center
  }

  .s_promotion {
    border: 1px dashed #f6a623;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    padding: 10px;
    margin: 10px 0
  }

  .s_promotion a {
    color: #288ad6
  }

  .rightInfo {
    float: right;
    width: 22.5%;
    overflow: visible;
    background: #fff;
    position: relative
  }

  .productOld {
    border: solid 1px #ddd;
    padding: 10px 12px 10px 12px;
    margin-bottom: 10px;
    border-radius: 3px;
    position: relative
  }

  .bannerdt img {
    width: 100%;
    border-radius: 3px;
    border: none
  }

  .bannerdtp {
    padding: 10px 10px 5px
  }

  .bannerdtp img {
    width: 100%;
    border-radius: 3px;
    border: none;
    height: auto
  }

  .promote {
    margin: 20px 0 10px;
    padding: 20px 10px 10px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: 1px solid #ddd;
    position: relative
  }

  .promote b {
    display: block;
    padding: 2px 8px;
    position: absolute;
    background: #fff9b4;
    border: solid 1px #e8dd58;
    text-align: center;
    top: -10px;
    left: 10px;
    font-size: 12px;
    font-weight: normal;
    line-height: 1.4;
    border-radius: 2px
  }

  .promote a {
    display: inline-block;
    color: #288ad6
  }

  .promote strong {
    color: #d0021b
  }

  .promote span {
    display: block;
    line-height: 20px;
    padding: 0 10px 0 20px;
    margin-bottom: 5px
  }

  .promote span:last-child {
    margin: 0
  }

  .promote span:before {
    content: '';
    margin-left: -20px;
    background: url(/Content/desktop/images/V4/game/check@2x.png);
    width: 14px;
    height: 14px;
    background-size: 14px 14px;
    margin-right: 0;
    float: left;
    margin-top: 2px
  }

  .boxProChoose .pro-chosse {
    display: block;
    width: 100%;
    height: 50px;
    margin-bottom: 10px
  }

  .boxProChoose .pro-chosse img {
    display: block;
    width: 50px;
    float: left;
    padding: 0;
    box-sizing: border-box;
    margin: 0 10px 0 15px
  }

  .boxProChoose .pro-chosse .dscp {
    display: flex;
    align-items: center;
    height: 50px;
    font-size: 14px;
    font-weight: normal;
    cursor: pointer;
    padding-right: 15px
  }

  .boxProChoose .pro-chosse .dscp u {
    text-decoration: unset;
    width: 80%
  }

  .proChooseNoImg .pro-chosse {
    margin: 0 0 10px 0;
    padding: 0 0 0 15px;
    cursor: pointer;
    display: block
  }

  .proChooseNoImg .pro-chosse i {
    display: inline-block;
    vertical-align: top
  }

  .proChooseNoImg .pro-chosse b.dscp {
    font-weight: normal;
    display: inline-block;
    width: calc(100% - 50px)
  }

  .proChooseNoImg .pro-chosse b.dscp u {
    text-decoration: unset
  }

  i.iconmobile-opt {
    background-position: -380px -30px;
    width: 16px;
    height: 16px;
    display: inline-block;
    vertical-align: sub;
    margin-right: 5px
  }

  .active i.iconmobile-opt {
    background-position: -400px -30px
  }

  .tsh {
    background-color: #ecf7ed;
    border-radius: 3px;
    border: solid 1px #c4ddc8;
    margin: 5px 10px 10px;
    padding: 0 10px;
    font-weight: bold;
    line-height: 30px
  }

  .tsh span {
    line-height: 30px;
    padding-left: 10px;
    border-left: 1px solid #c4ddc8;
    display: block;
    margin-left: 28px
  }

  .tsh span a {
    color: #30a43b
  }

  .tsh:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/nhan-hang-1-gio@2x.png);
    width: 19px;
    height: 21px;
    background-size: 19px 21px;
    margin-right: 10px;
    float: left;
    margin-top: 4px
  }

  .buylimit {
    border: 1px dashed #f6a623;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    padding: 10px
  }

  .buylimit p {
    line-height: 22px
  }

  .buylimit p select {
    border: 1px solid #d9d9d9;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    width: 100%;
    margin-right: 5px;
    text-align: center;
    padding: 7px;
    color: #288ad6
  }

  label.lspro span {
    display: block;
    margin: 10px 0
  }

  label.lspro a {
    color: #288ad6
  }

  label.lspro b {
    width: 48%;
    float: left;
    margin-bottom: 5px;
    margin-right: 2%;
    font-weight: normal;
    padding-bottom: 5px;
    border-bottom: 1px solid #ddd
  }

  label.lspro b.more {
    display: none
  }

  .memory {
    padding: 0 10px;
    float: left;
    width: 100%
  }

  .memory .m_default {
    margin-bottom: 15px
  }

  .memory .m_default .installment {
    display: none
  }

  .memory .item {
    position: relative;
    background: #fff;
    border: 1px solid #ddd;
    -moz-box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .15);
    -webkit-box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .15);
    box-shadow: 0 2px 3px 0 rgba(0, 0, 0, .15);
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    width: 24.5%;
    float: left;
    text-align: center;
    padding: 10px 10px 10px 10px;
    margin-right: 10px;
    margin-bottom: 15px;
    cursor: pointer
  }

  .memory .item.active {
    border: 1px solid #f89008
  }

  .memory .item.active:before,
  .memory .item.active:after {
    bottom: -22px;
    left: 50%;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none;
    display: none
  }

  .memory .item.active:after {
    border-color: rgba(255, 255, 255, 0);
    border-bottom-color: #fff;
    border-width: 10px;
    margin-left: -10px;
    z-index: 10
  }

  .memory .item.active:before {
    border-color: rgba(238, 238, 238, 0);
    border-bottom-color: #ddd;
    border-width: 11px;
    margin-left: -11px;
    z-index: 1
  }

  .memory .item.active.ishidebefore:before {
    display: none
  }

  .boxdefault .memory .item.active:before,
  .boxdefault .memory .item.active:after {
    border-width: 0
  }

  .memory .item span {
    color: #333
  }

  .memory .item.active span {
    font-weight: bold
  }

  .memory .item.i3 {
    margin-right: 0
  }

  .memory i.iconmobile-opt {
    background-position: -380px -30px;
    width: 16px;
    height: 16px;
    display: inline-block;
    vertical-align: sub;
    margin-right: 5px
  }

  .memory .item.active i.iconmobile-opt {
    background: url(/Content/desktop/images/V4/game/check.png);
    width: 14px;
    height: 14px
  }

  .memory .item strong {
    font-size: 16px;
    display: block;
    margin-top: 5px;
    color: #e10c00
  }

  .memory.clsDisKM .item.active:before,
  .memory.clsDisKM .item.active::after {
    display: none
  }

  .pro-img ul li {
    margin-bottom: 10px
  }

  .pro-img ul li label {
    display: block;
    width: 100%
  }

  .pro-img ul li label:after {
    content: "";
    display: table;
    clear: both
  }

  .pro-img ul li label img {
    display: block;
    width: 50px;
    float: left;
    padding: 0;
    box-sizing: border-box;
    margin: 0 10px 0 15px;
    cursor: pointer
  }

  .pro-img ul li label h3 {
    display: flex;
    align-items: center;
    height: auto;
    min-height: 50px;
    font-size: 14px;
    padding-right: 15px;
    line-height: 20px;
    float: left;
    width: calc(100% - 100px)
  }

  .pro-img ul li label h3 a {
    display: inline;
    font-size: 13px
  }

  .wrap_wrtp {
    overflow: hidden;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    height: 115vh;
    background: rgba(0, 0, 0, .5);
    z-index: 11
  }

  .wrap_wrtp .pop {
    display: block;
    overflow: hidden;
    position: relative;
    width: 100%;
    max-width: 720px;
    margin: auto;
    background: #fff;
    margin-top: 10%;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    border-radius: 5px
  }

  .wrap_wrtp .pop .hdpop {
    padding: 10px 0 10px 10px;
    border-bottom: solid 1px #ccc;
    font-size: 15px;
    background: #ffd901;
    color: #333;
    font-weight: bold
  }

  .wrap_wrtp .pop .hdpop .closehd {
    float: right;
    color: #333;
    height: 25px;
    width: 25px;
    position: absolute;
    top: 8px;
    right: 7px;
    font-size: 23px;
    text-align: center;
    cursor: pointer;
    font-style: normal;
    box-sizing: border-box;
    padding-top: 3px
  }

  .wrap_wrtp .pop .ctW {
    line-height: 20px;
    font-size: 13px
  }

  .wrap_wrtp .pop .ctW table td {
    padding: 5px
  }

  .wrap_wrtp .pop .ctW .bh {
    padding: 10px 3%
  }

  .wrap_wrtp .pop .ctW .bh a {
    color: #288ad6;
    display: block;
    position: relative
  }

  .wrap_wrtp .pop .ctW .bh a:after {
    position: absolute;
    content: '';
    width: 0;
    height: 0;
    border-left: 5px solid #4a90e2;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent;
    display: inline-block;
    margin: 4px 0 0 5px
  }

  .wrap_wrtp .pop .ctW .bh .tlt {
    display: block;
    font-weight: bold;
    margin: 0 0 5px
  }

  .wrap_wrtp .pop .ctW .cs {
    margin-top: 5px;
    padding: 10px 3%;
    background: #f3f3f3
  }

  .wrap_wrtp .pop .ctW .cs .tlt {
    margin: 0 0 10px;
    font-weight: bold;
    display: block
  }

  .wrap_wrtp .pop .ctW .cs .tlt .nt {
    color: #f7812a;
    display: block;
    font-weight: normal
  }

  .wrap_wrtp .pop .ctW .cs h2 {
    background-color: #fff;
    padding: 10px;
    font-weight: bold;
    color: #288ad6;
    border-bottom: solid 1px #f3f3f3;
    cursor: pointer;
    position: relative
  }

  .wrap_wrtp .pop .ctW .cs h2::after {
    content: "";
    width: 0;
    right: 15px;
    top: 15px;
    border-left: 5px solid transparent;
    border-top: 5px solid #288ad6;
    border-right: 5px solid transparent;
    position: absolute;
    transform: rotate(180deg)
  }

  .wrap_wrtp .pop .ctW .cs h2.down::after {
    transform: rotate(0)
  }

  .wrap_wrtp .pop .ctW .cs div {
    padding: 10px;
    background-color: #fff;
    display: none
  }

  .wrap_wrtp .pop .xct {
    display: block;
    padding: 10px 0
  }

  .wrap_wrtp .pop .xct a {
    color: #288ad6;
    position: relative;
    padding-right: 20px
  }

  .wrap_wrtp .pop .xct a:after {
    position: absolute;
    content: '';
    width: 0;
    height: 0;
    border-left: 5px solid #4a90e2;
    border-top: 5px solid transparent;
    border-bottom: 5px solid transparent;
    display: inline-block;
    margin: 4px 0 0 8px
  }

  .zalopay {
    background: #f3fbff;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    padding: 6px 10px;
    margin: 5px 10px 12px
  }

  .zalopay img {
    display: inline-block;
    vertical-align: middle
  }

  .zalopay b {
    color: #c10017
  }

  .zalopay a {
    color: #288ad6
  }

  .boxshock {
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    margin: 0 10px
  }

  .boxshockheader {
    background-color: #e21d22;
    padding: 10px;
    text-align: left;
    position: relative;
    -moz-border-radius: 5px 5px 0 0;
    -webkit-border-radius: 5px 5px 0 0;
    border-radius: 5px 5px 0 0
  }

  .boxshockheader .bgleft {
    background-image: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/game/shock/element_left.png);
    width: 38px;
    height: 50px;
    position: absolute;
    top: 0;
    left: 0
  }

  .boxshockheader .bgright {
    background-image: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/game/shock/element_right.png);
    width: 38px;
    height: 50px;
    position: absolute;
    top: 0;
    right: 0
  }

  .boxshockheader>img {
    width: 74px;
    height: 42px;
    display: inline-block;
    border-right: 1px solid #fff;
    padding-right: 10px;
    padding-top: 0;
    margin-right: 10px
  }

  .boxshockheader>div {
    display: inline-block;
    vertical-align: top;
    margin-top: 5px
  }

  .boxshockheader div.NotCms {
    margin-top: 15px
  }

  .boxshockheader label {
    display: block;
    text-align: left;
    color: #fff;
    font-weight: bold
  }

  .boxshockheader label strong {
    font-size: 22px;
    color: #f8e81c;
    text-align: left
  }

  .boxshockheader label strong.priceline {
    font-weight: normal;
    text-decoration: line-through;
    color: #fff;
    font-size: 16px
  }

  .boxshockheader span {
    font-size: 13px;
    color: #fff
  }

  .boxshock .bgbottom {
    background-image: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/game/shock/bg2.png);
    background-color: #fff4de;
    background-repeat: repeat-x;
    background-position: bottom;
    height: 7px
  }

  .boxshockcontent {
    background-color: #fff4de;
    padding: 10px;
    border: 1px solid #ddd;
    border-top: none;
    -moz-border-radius: 0 0 5px 5px;
    -webkit-border-radius: 0 0 5px 5px;
    border-radius: 0 0 5px 5px
  }

  .boxshock .area_promotion {
    display: block;
    overflow: hidden;
    border: none;
    -moz-border-radius: unset;
    -webkit-border-radius: unset;
    border-radius: unset;
    position: relative;
    margin: 0;
    background: #fff;
    padding-bottom: 10px;
    -moz-box-shadow: none;
    -webkit-box-shadow: none;
    box-shadow: none
  }

  .boxshock .area_promotion.rule {
    background: #fff4de;
    margin: -10px -10px 5px -10px;
    padding: 0 10px 5px 10px
  }

  .boxshock .area_promotion strong {
    padding: 0;
    text-transform: none;
    background: none;
    border-bottom: none;
    font-weight: bold
  }

  .boxshock .area_promotion span {
    padding: 8px 10px 0 15px;
    display: block;
    overflow: hidden;
    font-size: 14px;
    color: #333
  }

  .boxshock .area_promotion span:before {
    content: "•";
    margin-left: -15px;
    background: none;
    color: #999;
    margin-top: 0;
    font-size: 20px;
    float: left
  }

  .boxshock a.buy_now {
    display: block;
    overflow: hidden;
    padding: 9px 0;
    background-image: linear-gradient(-180deg, #e52025 2%, #d81116 96%);
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    font-size: 16px;
    line-height: normal;
    text-transform: uppercase;
    color: #fff;
    text-align: center
  }

  .boxshock a.buy_now strong {
    color: #fff
  }

  .boxshock a.buy_now span {
    display: block;
    font-size: 12px;
    color: #fff;
    text-transform: none
  }

  .boxshock .buy_ins {
    line-height: normal;
    display: block;
    padding: 9px 0;
    text-align: center;
    margin: 10px 0 0;
    background-image: linear-gradient(-180deg, #288ad6 0%, #0e74c3 100%);
    -moz-border-radius: 5px;
    -webkit-border-radius: 5px;
    border-radius: 5px;
    color: #fff;
    font-size: 16px;
    text-transform: uppercase
  }

  .boxshock .buy_ins span {
    display: block;
    font-size: 12px;
    color: #fff;
    text-transform: none
  }

  .boxshock a.danhsach {
    text-align: center;
    display: block;
    font-size: 14px;
    margin-top: 10px;
    color: #4a90e2;
    cursor: pointer
  }

  .hr {
    padding: 15px 0;
    box-sizing: border-box;
    display: block;
    margin: 6px 9px 0
  }

  .hr label {
    border-top: 1px solid #ddd;
    width: 30%;
    float: left
  }

  .hr span {
    width: 40%;
    float: left;
    margin-top: -8px;
    text-align: center
  }

  @media screen and (max-width:1536px) {
    .fotorama__wrap--css3 .fotorama__stage .fotorama__img {
      width: auto !important;
      height: auto !important;
      max-height: 90% !important;
      position: absolute !important;
      margin: auto !important;
      top: 0 !important;
      left: 0 !important;
      right: 0 !important;
      bottom: 0 !important
    }
  }

  @media screen and (max-width:1200px) {
    .price_sale {
      margin: 0
    }

    #owl-detail .owl-buttons {
      top: 42%
    }

    .box_content {
      margin: 0 10px
    }

    .info_sp {
      margin: 0 0 10px 0
    }

    h1 {
      margin: 0 0 0 10px
    }

    .checkexist,
    .likeshare {
      margin-right: 10px
    }
  }

  @media screen and (max-width:1366px) {
    .wrap_wrtp .pop .ctW .cs {
      overflow-y: scroll;
      max-height: 385px
    }

    .fotorama__wrap--css3 .fotorama__stage .fotorama__img {
      width: auto !important;
      height: auto !important;
      max-height: 90% !important;
      position: absolute !important;
      margin: auto !important;
      top: 0 !important;
      left: 0 !important;
      right: 0 !important;
      bottom: 0 !important
    }
  }

  @media all and (-webkit-min-device-pixel-ratio:1.5) {
    .icontgdd-hstar {
      background-position: -421px -30px;
      width: 12px;
      height: 12px
    }
  }

  .order-review {
    border: 1px solid #ddd;
    background: #eee;
    padding: 10px 0;
    margin: 20px auto;
    max-width: 600px
  }

  .order-review .left {
    float: left;
    width: calc(50%);
    padding: 30px 0 30px 30px
  }

  .order-review .left p {
    margin: 0
  }

  .order-review .left .before-apprise {
    font-size: 12px;
    display: none
  }

  .order-review .left .before-apprise b {
    color: #288ad6;
    font-size: 16px
  }

  .order-review .right {
    float: right;
    width: 45%
  }

  .order-review .right a {
    display: inline-block;
    text-align: center;
    width: 125px;
    color: #333
  }

  .order-review .right a.replay-icon {
    float: right;
    margin-right: 22px
  }

  .order-review .right a.good:hover,
  .order-review .right a.good.act {
    font-weight: bold;
    color: #4b64a7;
    background-color: #eee;
    border: none
  }

  .order-review .right a.bad:hover,
  .order-review .right a.bad.act {
    font-weight: bold;
    color: #dc6d84;
    background-color: #eee;
    border: none
  }

  .order-review .right a i {
    display: block;
    margin: 10px auto
  }

  .order-review .reason {
    display: none;
    position: relative;
    margin-bottom: 10px
  }

  .order-review .reason textarea {
    border: 1px solid #ddd;
    border-radius: 4px;
    display: block;
    width: 85%;
    height: 80px;
    margin: 0 auto;
    padding: 15px
  }

  .order-review .reason p {
    width: 89%;
    margin: 0 auto;
    font-size: 13px;
    padding: 10px 0
  }

  .order-review .reason div.dropdown {
    display: inline-block;
    vertical-align: top;
    width: 145px;
    position: relative;
    margin-right: 10px
  }

  .order-review .reason div.dropdown:nth-child(3) {
    margin-left: 32px
  }

  .order-review .reason div.dropdown span {
    color: #288ad6;
    border: 1px solid #288ad6;
    border-radius: 4px;
    padding: 5px 10px;
    display: block;
    font-size: 14px;
    background-color: #fff;
    cursor: pointer
  }

  .order-review .reason div.dropdown span:after {
    content: '';
    width: 0;
    height: 0;
    border-top: 6px solid #288ad6;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    float: right;
    margin-top: 8px
  }

  .order-review .reason div.dropdown div {
    background: #fff;
    border: 1px solid #d9d9d9;
    border-radius: 4px;
    box-shadow: 0 10px 10px 0 rgba(0, 0, 0, .1);
    padding-bottom: 10px;
    position: absolute;
    left: 0;
    top: 42px;
    z-index: 11;
    width: 98.8%;
    display: none
  }

  .order-review .reason div.dropdown div:before,
  .order-review .reason div.dropdown div:after {
    content: '';
    width: 0;
    height: 0;
    position: absolute;
    bottom: 100%;
    left: 20%;
    border-bottom: 10px solid #d9d9d9;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent
  }

  .order-review .reason div.dropdown div:after {
    border-width: 9px;
    border-bottom-color: #fff;
    margin-left: 1px
  }

  .order-review .reason div.dropdown div a {
    display: block;
    font-size: 14px;
    padding: 10px 10px 0 10px
  }

  .order-review .reason:before,
  .order-review .reason:after {
    content: '';
    position: absolute;
    bottom: 99%;
    right: 270px;
    width: 0;
    height: 0;
    border-bottom: 10px solid #ddd;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent
  }

  .order-review .reason.bd:before,
  .order-review .reason.bd:after {
    right: 75px
  }

  .order-review .reason:after {
    border-width: 9px;
    margin-right: 1px;
    border-bottom-color: #fff
  }

  .order-review .reason a.submit {
    color: #fff;
    font-size: 14px;
    display: inline-block;
    vertical-align: top;
    background: #288ad6;
    text-align: center;
    width: 100px;
    height: 33px;
    line-height: 33px;
    border-radius: 4px
  }

  .order-review .reason a.closeform {
    color: #fff;
    font-size: 14px;
    display: inline-block;
    vertical-align: top;
    background: #288ad6;
    text-align: center;
    width: 100px;
    height: 33px;
    line-height: 33px;
    border-radius: 4px
  }

  .order-review .thank {
    display: none;
    padding: 30px 0;
    background: #eee;
    overflow: auto
  }

  .order-review .thank .left-thank {
    float: left;
    width: calc(55%);
    padding: 0 30px
  }

  .order-review .thank .left-thank b {
    color: #4b64a7
  }

  .order-review .thank .left-thank span {
    font-size: 14px
  }

  .order-review .thank .right-thank .replay-icon-thank {
    font-weight: bold;
    color: #4b64a7;
    background-color: #eee;
    border: none;
    float: right;
    margin-right: 60px;
    margin-top: -15px
  }

  .order-review .thank .right-thank .replay-icon-thank i {
    display: block;
    margin: 10px auto
  }

  [class^="icondmx-"],
  [class*="icondmx-"] {
    background: url(https://cdn.tgdd.vn/dmx2016/Content/images/V2/cart/iconcartmobile@2x.v201904141540.png) no-repeat;
    background-size: 173px 110px;
    vertical-align: middle;
    display: inline-block
  }

  .icondmx-good {
    background-size: 346px 220px;
    background-position: -52px -180px;
    width: 40px;
    height: 40px
  }

  .icondmx-bad {
    background-size: 346px 220px;
    background-position: 0 -180px;
    width: 40px;
    height: 40px
  }

  .order-review p.er-content {
    text-align: center;
    color: #f00;
    font-size: 14px;
    display: none
  }

  ul.printer>li[data-stock='0'] {
    display: none
  }

  .listmarket ul.printer>li span {
    display: none
  }

  .boxshockcontentpromo {
    background-color: #fff4de;
    border: 1px solid #ddd;
    border-top: none;
    overflow: auto
  }

  .boxshockcontentpromo a {
    color: #288ad6
  }

  .boxshockcontentpromo strong {
    display: block;
    overflow: hidden;
    font-size: 15px;
    color: #333;
    padding: 15px 15px 10px 10px;
    text-transform: uppercase
  }

  .boxshockcontentpromo .infopr span {
    display: block;
    overflow: hidden;
    font-size: 14px;
    color: #333;
    padding: 0 15px 5px 30px
  }

  .boxshockcontentpromo .infopr span:before {
    content: '';
    margin-left: -20px;
    background: url(/Content/desktop/images/V4/game/check@2x.png);
    width: 14px;
    height: 14px;
    background-size: 14px 14px;
    margin-right: 0;
    float: left;
    margin-top: 2px
  }

  .boxshockcontentpromo .choose-promoSock .pro-title-Shock {
    display: block;
    overflow: hidden;
    font-size: 13px;
    color: #333;
    padding: 10px 0 0 0;
    text-transform: uppercase;
    margin: 5px 10px
  }

  .boxshockcontentpromo .choose-promoSock span {
    margin: 0 0 5px 0;
    padding: 0 0 0 10px;
    cursor: pointer;
    display: block
  }

  .boxshockcontentpromo .choose-promoSock b.dscp {
    font-weight: normal;
    display: inline-block;
    width: calc(100% - 50px)
  }

  .boxshockcontentpromo .choose-promoSock b.dscp u {
    text-decoration: unset
  }

  .boxshockcontentpromo .choose-promoSock span i {
    display: inline-block;
    vertical-align: top
  }

  .boxshockcontent .notechooseShockPrice {
    background: #fff46a;
    padding: 10px;
    margin: 10px 0;
    display: none;
    font-size: 12px;
    color: #333;
    text-align: left
  }

  .boxshockcontentpromo.once strong {
    display: none
  }

  .boxshockcontentpromo.once .choose-promoSock .pro-title-Shock {
    margin: 0 10px 10px 10px;
    border-top: 0
  }

  .tableparameter.couple .tabparameter {
    height: 38px;
    margin-top: 10px;
    margin-bottom: 1px;
    position: relative;
    z-index: 2
  }

  .tableparameter.couple .tabparameter a {
    display: inline-block;
    vertical-align: top;
    line-height: 38px;
    background-color: #f4f4f4;
    padding: 0 50px;
    color: #333;
    font-size: 15px;
    border: 1px solid #eee;
    margin-right: -5px;
    position: relative
  }

  .tableparameter.couple .tabparameter a.active {
    background-color: #fff;
    border-bottom-color: #fff
  }

  .tableparameter.couple .tabparameter a.active:before {
    content: "";
    height: 3px;
    width: calc(100% + 2px);
    background-color: #4a90e2;
    left: -1px;
    top: 0;
    position: absolute
  }

  .tableparameter.couple .parameter {
    padding-top: 0
  }

  .tableparameter.couple .parameter li.show {
    display: table !important
  }

  .laptop-same-line {
    clear: both;
    display: block;
    overflow: hidden;
    padding: 10px 0
  }

  .laptop-same-line .title {
    padding: 10px 0;
    position: relative
  }

  .laptop-same-line .title h4 {
    display: inline-block;
    overflow: hidden;
    vertical-align: middle;
    font-size: 20px;
    color: #333;
    padding: 10px 0
  }

  #owl-laptop-line {
    width: 80%;
    float: right
  }

  .laptop-same-first {
    width: 19.9%
  }

  #owl-laptop-line .item,
  .laptop-same-first {
    float: left;
    overflow: hidden;
    padding: 0 5px 20px;
    box-sizing: border-box;
    border: 1px solid #eee;
    min-height: 367px;
    width: -webkit-fill-available;
    max-width: 240px
  }

  #owl-laptop-line .first,
  .laptop-same-first {
    border: 1px solid #f28902
  }

  #owl-laptop-line .item a,
  .laptop-same-first a {
    display: block;
    overflow: hidden;
    color: #288ad6
  }

  #owl-laptop-line .item a.strLaptopline,
  .laptop-same-first a.strLaptopline {
    padding-top: 10px
  }

  #owl-laptop-line .item a img,
  .laptop-same-first a img {
    width: 180px;
    margin: 5px auto;
    margin-left: 23px
  }

  #owl-laptop-line .item p,
  .laptop-same-first p {
    margin-top: 10px;
    text-align: center;
    height: 20px;
    color: #f28902;
    font-size: 13px
  }

  #owl-laptop-line .item .price-laptop-line,
  .laptop-same-first .price-laptop-line {
    display: block;
    overflow: hidden
  }

  #owl-laptop-line .item .price-laptop-line strong,
  .laptop-same-first .price-laptop-line strong {
    display: inline-block;
    vertical-align: middle;
    overflow: hidden;
    font-size: 14px;
    color: #e10c00;
    line-height: 15px
  }

  #owl-laptop-line .item .price-laptop-line span,
  .laptop-same-first .price-laptop-line span {
    display: inline-block;
    vertical-align: middle;
    font-size: 12px;
    text-decoration: line-through;
    margin-left: 5px;
    color: #222
  }

  #owl-laptop-line .item a .line-tooltip,
  .laptop-same-first a .line-tooltip {
    color: #333;
    line-height: 1.5;
    padding: 10px 10px 0 0
  }

  #owl-laptop-line .item a .line-tooltip span,
  .laptop-same-first a .line-tooltip span {
    display: block;
    margin-left: 10px;
    font-size: 12px;
    line-height: 20px;
    color: #666
  }

  #owl-laptop-line .item a .line-tooltip span:before,
  .laptop-same-first a .line-tooltip span:before {
    content: "•";
    color: #b7b7b7;
    display: inline-block;
    vertical-align: middle;
    font-size: 15px;
    margin-right: 6px;
    margin-left: -10px
  }

  #owl-laptop-line .owl-prev {
    position: absolute;
    left: 0;
    padding: 10px 0 0;
    margin: 0;
    background: rgba(0, 0, 0, .4);
    width: 25px;
    height: 35px;
    text-align: center;
    font-size: 38px;
    color: #fff;
    font-family: -webkit-body;
    box-shadow: 0 0 4px 2px rgba(0, 0, 0, .15);
    top: 115px
  }

  #owl-laptop-line .owl-next {
    position: absolute;
    right: 0;
    padding: 10px 0 0;
    margin: 0;
    background: rgba(0, 0, 0, .4);
    width: 25px;
    height: 35px;
    text-align: center;
    font-size: 38px;
    color: #fff;
    font-family: -webkit-body;
    box-shadow: 0 0 4px 2px rgba(0, 0, 0, .15);
    top: 115px
  }

  #owl-laptop-line .last div {
    position: sticky;
    top: 50%;
    padding: 0 30px;
    text-align: center;
    overflow: hidden;
    display: inherit
  }

  #owl-laptop-line .last div h3 {
    margin: 0 20px 5px;
    font-size: 14px
  }

  .wrap_wrtp .pop.laptopcenter {
    border-radius: 4px;
    min-height: 350px
  }

  .wrap_wrtp .pop .hdpop.bgwhite {
    background: #fff;
    border-bottom: none
  }

  .citydis.laptopcenter {
    height: 40px;
    margin-bottom: 10px;
    position: relative
  }

  .citydis.laptopcenter .title {
    float: left;
    margin: 10px 10px 0 0
  }

  .citydis.laptopcenter .city {
    float: left;
    position: relative;
    width: 41%;
    border: 1px solid #d9d9d9;
    background: #fff;
    border-radius: 3px;
    font-size: 14px;
    color: #288ad6
  }

  .citydis.laptopcenter .dist {
    float: right;
    position: relative;
    width: 42%;
    border: 1px solid #d9d9d9;
    background: #fff;
    border-radius: 3px;
    font-size: 14px;
    color: #288ad6
  }

  .citydis.laptopcenter .listcity {
    display: none;
    overflow: visible;
    position: absolute;
    z-index: 15;
    top: 43px;
    left: 12%;
    width: 287px;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding-bottom: 10px
  }

  .citydis.laptopcenter .listdist {
    display: none;
    overflow: visible;
    position: absolute;
    z-index: 15;
    top: 43px;
    right: 0;
    left: auto;
    width: 290px;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 4px;
    padding-bottom: 10px
  }

  .citydis.laptopcenter .scroll {
    float: left;
    width: 100%;
    max-height: 170px;
    overflow: auto
  }

  .citydis.laptopcenter .listcity aside,
  .citydis.laptopcenter .listdist aside {
    float: left;
    width: 50%
  }

  .wrap_wrtp .pop.laptopcenter .ctW .bh a:after {
    border-left: 0;
    border-top: 0;
    border-bottom: 0;
    display: none
  }

  .citydis.laptopcenter .searchlocal div {
    display: block;
    border: 1px solid #d9d9d9;
    border-radius: 4px;
    background: #fff;
    height: 34px;
    position: relative
  }

  .listmarket.laptopcenter {
    border-bottom: none;
    border-top: 1px solid #d9d9d9;
    max-height: 350px;
    overflow: auto;
    padding-top: 5px
  }

  .listmarket.laptopcenter .titleCenter {
    display: block;
    padding: 10px 0;
    text-transform: uppercase;
    font-weight: 600
  }

  .listmarket.laptopcenter li span.yes {
    color: #14b61b
  }

  .listmarket.laptopcenter li span.two-7date {
    color: #e67e22
  }

  .listmarket.laptopcenter li label:before {
    content: '•';
    display: inline-block;
    vertical-align: middle;
    margin-right: 5px;
    font-size: 20px;
    color: #999;
    margin: 0 3px 0 0
  }

  .loading-laptopcenter {
    display: block;
    margin: 10px auto;
    text-align: center
  }

  #listlaptopcenter li h3.name {
    display: block;
    clear: both;
    margin: 10px;
    text-align: center
  }

  a.linkcart {
    display: inline-block !important;
    padding-left: 10px;
    font-size: 12px
  }

  a.linkcart:hover {
    color: #333
  }

  .text-viewimage {
    color: #666;
    font-size: 14px;
    display: block;
    width: 60%;
    text-align: center;
    margin: 0 auto;
    margin-top: 15px
  }

  .pop-rate {
    position: fixed;
    right: 66px;
    bottom: 118px;
    text-align: center;
    background: rgba(255, 255, 255, .9);
    z-index: 999999;
    border-radius: 4px;
    overflow: hidden;
    display: none
  }

  .pop-rate b {
    display: block;
    font-weight: normal;
    padding: 10px;
    border-bottom: 1px solid #ccc
  }

  .pop-rate a {
    display: inline-block;
    vertical-align: top;
    width: 49%;
    padding: 10px 0;
    color: #288ad6;
    outline: none
  }

  .pop-rate a:last-child {
    border-left: 1px solid #ccc
  }

  .pop-rate b.d2 {
    font-weight: bold;
    border-bottom: none;
    color: #76a549;
    padding: 10px 20px
  }

  .pop-rate.end {
    width: 500px;
    height: 80px;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto
  }

  .pop-rate.end b.d2 {
    line-height: 60px
  }

  .pop-rate-overlay {
    position: fixed;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, .85);
    left: 0;
    top: 0;
    z-index: 999998;
    display: none
  }

  .ytp-pause-overlay {
    display: none
  }

  @font-face {
    font-family: 'UTM HABANO';
    src: url('/Content/fonts/UTM_Habano.ttf')
  }

  .boxshock.lunar {
    background: #a10f0f url(/Content/desktop/images/tet2020/bg-detail.png) no-repeat center top;
    background-size: 100% auto
  }

  .boxshock.lunar .boxshockheader {
    background-color: transparent;
    text-align: center;
    padding: 33px 0 10px 0
  }

  .boxshock.lunar .boxshockheader h3 {
    font-family: 'UTM HABANO';
    text-align: center;
    font-size: 28px;
    background: linear-gradient(-180deg, #ffd96a 37%, #ffeaab 57%, #f7ef3d 76%);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    display: inline;
    padding: 0 5px;
    font-weight: bold
  }

  .boxshock.lunar .boxshockheader>b {
    display: inline-block;
    padding: 7px 40px;
    margin: 10px 0;
    background: rgba(0, 0, 0, .2);
    border-radius: 20px;
    font-size: 20px;
    color: #fff001
  }

  .boxshock.lunar .boxshockheader>b>b {
    color: #fff;
    font-size: 16px;
    text-decoration: line-through;
    display: inline-block;
    vertical-align: top;
    margin-left: 5px;
    font-weight: normal
  }

  .boxshock.lunar .boxshockcontent {
    background: none;
    border: none
  }

  .boxshock.lunar .boxshockcontent .promotion {
    color: #fff;
    border-bottom: 1px solid #df4344;
    margin-bottom: 10px
  }

  .boxshock.lunar .boxshockcontent .promotion .title {
    text-transform: uppercase;
    margin-bottom: 5px;
    display: block
  }

  .boxshock.lunar .boxshockcontent .promotion .title label {
    color: #fff;
    font-weight: 600
  }

  .boxshock.lunar .boxshockcontent .promotion span {
    display: block;
    overflow: hidden;
    font-size: 14px;
    padding: 0 15px 5px 20px
  }

  .boxshock.lunar .boxshockcontent .promotion span:before {
    content: '';
    margin-left: -20px;
    background: url(/Content/desktop/images/V4/game/check@2x.png);
    width: 14px;
    height: 14px;
    background-size: 14px 14px;
    margin-right: 0;
    float: left;
    margin-top: 2px
  }

  .boxshock.lunar .area_promotion.rule {
    background: none
  }

  .boxshock.lunar .area_promotion span {
    color: #fff
  }

  .boxshock.lunar .area_promotion a {
    color: #fff001
  }

  .boxshock.lunar .area_promotion span:before {
    color: #fff001
  }

  .boxshock.lunar a.buy_now {
    background: #fd6e1d;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
    background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
    background: -moz-linear-gradient(top, #f59000, #fd6e1d);
    background: -ms-linear-gradient(top, #f59000, #fd6e1d);
    background: -o-linear-gradient(top, #f59000, #fd6e1d)
  }

  .boxshock.lunar .area_promotion strong {
    display: inline;
    color: #fff001
  }

  .lunar>img {
    display: block;
    max-width: calc(100% - 20px);
    margin: 0 auto 10px auto
  }

  .productgallery-container {
    background: #fff;
    border-bottom: 1px solid #e5e5e5;
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    width: 100%;
    z-index: 100000;
    display: none
  }

  .productgallery-container .productgallery-inside {
    width: 100%;
    max-width: 900px;
    margin: 5px auto;
    min-height: 55px
  }

  .productgallery-container .productgallery-inside .div-img {
    float: left;
    margin-right: 10px;
    display: inline-block
  }

  .productgallery-container .productgallery-inside .div-img img {
    display: block;
    width: 40px;
    height: auto
  }

  .productgallery-container .productgallery-inside .pro-info {
    float: left;
    display: inline-block
  }

  .productgallery-container .productgallery-inside .pro-info h3 {
    display: block;
    font-weight: 600;
    line-height: 1.5;
    max-width: 300px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis
  }

  .productgallery-container .productgallery-inside .pro-info span.line-price {
    display: inline-block;
    text-decoration: line-through;
    color: #999;
    font-size: 13px
  }

  .productgallery-container .productgallery-inside .pro-info strong {
    color: #e10c00
  }

  .productgallery-container .productgallery-inside .button-container {
    float: right;
    width: auto
  }

  .productgallery-container .productgallery-inside .button-container .buy_now {
    display: inline-block;
    min-width: 140px;
    margin-right: 5px;
    padding: 10px 5px;
    border-radius: 4px;
    font-size: 16px;
    line-height: normal;
    text-transform: uppercase;
    color: #fff;
    text-align: center;
    background: #fd6e1d;
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
    background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
    background: -moz-linear-gradient(top, #f59000, #fd6e1d);
    background: -ms-linear-gradient(top, #f59000, #fd6e1d);
    background: -o-linear-gradient(top, #f59000, #fd6e1d);
    font-size: 12px;
    margin-top: 5px
  }

  .productgallery-container .productgallery-inside .button-container .buy_now.repayment {
    background: #288ad6
  }

  .productgallery-container .productgallery-inside .button-container .buy_now.repayment.padding {
    padding: 10px 5px
  }

  .parameter li span a {
    color: #288ad6
  }

  .boxshockheader>div.noccountdown {
    margin-top: 15px
  }

  /* 12:31:04 06/04/2020 */
  .iconmobile-checkbox {
    background-position: -145px -30px;
    width: 16px;
    height: 16px;
    vertical-align: sub
  }

  .check .iconmobile-checkbox {
    background-position: -165px -30px
  }

  .notemoreproduct {
    cursor: pointer;
    position: relative
  }

  .notemoreproduct .t {
    display: block;
    padding: 2px 8px;
    position: absolute;
    background: #fff9b4;
    border: solid 1px #e8dd58;
    text-align: center;
    top: -10px;
    left: 10px;
    font-size: 12px;
    font-weight: normal;
    line-height: 1.4;
    -moz-border-radius: 2px;
    -webkit-border-radius: 2px;
    border-radius: 2px
  }

  .notemoreproduct .last {
    display: none;
    padding: 10px;
    margin-top: 10px;
    position: relative;
    background: #fff;
    border: 1px solid #ccc;
    border-radius: 4px
  }

  .notemoreproduct .last:before,
  .notemoreproduct .last:after {
    content: '';
    position: absolute;
    bottom: 100%;
    left: 29px;
    width: 0;
    height: 0;
    border-bottom: 10px solid #ccc;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent
  }

  .notemoreproduct .last:before {
    border-bottom: 10px solid #ccc
  }

  .notemoreproduct .last:after {
    border-width: 9px;
    margin-left: 1px;
    border-bottom-color: #fff
  }

  ul.listmorecolor {
    display: block;
    overflow: hidden;
    margin-top: 10px
  }

  ul.listmorecolor li {
    float: left;
    overflow: hidden;
    padding-bottom: 3px;
    margin: 0 15px 0 0;
    text-align: center;
    font-size: 11px;
    color: #333;
    min-height: 0;
    border-bottom: none
  }

  ul.listmorecolor li img {
    width: auto;
    height: 40px;
    margin: 0;
    display: block
  }

  ul.listmorecolor li.choosed div {
    border-color: #f89008
  }

  ul.listmorecolor li div {
    display: block;
    height: 40px;
    position: relative;
    border: 1px solid #dfdfdf;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    padding: 6px;
    background: #fff;
    margin: auto;
    margin-bottom: 3px
  }

  ul.listmorecolor li.choosed .iconmobile-radiosim {
    border-color: #2dc535;
    background-color: #2dc535
  }

  ul.listmorecolor li.choosed .iconmobile-radiosim:after {
    content: '';
    display: block;
    width: 2px;
    height: 6px;
    border: solid #fff;
    border-width: 0 2px 2px 0;
    transform: rotate(50deg);
    background: none;
    margin: -2px 0 0 1px;
    border-radius: 0
  }

  ul.listmorecolor .iconmobile-radiosim {
    width: 6px;
    height: 6px;
    border-radius: 3px;
    padding: 3px;
    border: 1px solid #ccc;
    background: #fff;
    margin: 2px auto;
    display: block
  }

  .last .i {
    border-top: 1px solid #eee;
    padding: 10px 0 0 0;
    margin-top: 5px
  }

  .vipservice {
    border: 1px solid #ccc;
    border-radius: 4px;
    padding: 12px 12px 5px 12px;
    margin: 0 10px
  }

  .vipservice>* {
    margin-bottom: 10px
  }

  .vipservice>b {
    display: block
  }

  .vipservice>b>b {
    color: #f01
  }

  .vipservice>div>a {
    color: #333
  }

  .vipservice>div>a:hover {
    text-decoration: none
  }

  .vipservice>div i.iconmobile-checkbox {
    margin-right: 5px
  }

  .vipservice>div>div.form {
    border: 1px solid #ccc;
    border-radius: 4px;
    margin-top: 10px;
    position: relative;
    display: none;
    overflow: hidden
  }

  .vipservice>div>div.form:before,
  .vipservice>div>div.form:after {
    content: '';
    position: absolute;
    bottom: 100%;
    left: 50px;
    width: 0;
    height: 0;
    border-bottom: 10px solid #ccc;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent
  }

  .vipservice>div>div.form:after {
    border-width: 9px;
    margin-left: 1px;
    border-bottom-color: #fff
  }

  .vipservice>div>div>input {
    display: block;
    width: 96%;
    height: 35px;
    line-height: 35px;
    border: none;
    padding: 0 2%
  }

  .price_sale .vipservice ul.listmorecolor li.choosed div {
    border-color: #f89008
  }

  .area_promotion .vipservice {
    border: none;
    margin: 10px 12px 0 12px;
    border-top: 1px solid #ccc;
    padding: 12px 0 0 0;
    border-radius: 0
  }

  .area_address .vipservice {
    margin: 0;
    padding: 0;
    border: none
  }

  .area_address .vipservice>* {
    margin: 10px 0 0 0
  }

  .area_address .vipservice>b {
    display: none
  }

  .area_address .vipservice>div.o3 {
    margin-bottom: 0
  }

  .colinfo .notemoreproduct {
    margin-top: 5px
  }

  .notemoreproduct .iconmobile-checkbox {
    margin-right: 5px
  }

  .htkt {
    margin-top: 10px
  }

  .error-color {
    padding: 7px 10px;
    margin: 20px 30px 0 30px;
    display: block;
    border: 1px solid #c10017;
    background-color: #ffedec;
    color: #c10017;
    line-height: 1.5;
    border-radius: 4px
  }

  @media screen and (max-width:720px) {
    .error-color {
      margin: 10px;
      font-size: 13px
    }

    .colinfo .notemoreproduct {
      margin: -15px 10px 0 0
    }

    ul .listmorecolor li {
      margin-right: 10px
    }

    .iconmobile-checkbox {
      background-position: -160px -55px
    }

    .check .iconmobile-checkbox {
      background-position: -160px -75px
    }

    .vipservice>div>a {
      display: block;
      position: relative;
      padding-left: 20px
    }

    .vipservice>div a i.iconmobile-checkbox {
      position: absolute;
      left: 0;
      top: 1px
    }
  }

  @media screen and (max-width:384px) {
    .notemoreproduct .last {
      padding-bottom: 5px;
      padding-top: 8px
    }

    .notemoreproduct .last .addmore>div {
      font-size: 12px;
      white-space: nowrap
    }

    ul.listmorecolor {
      margin-top: 0
    }
  }

  /* 01:50:06 11/02/2020 */
  /*
    Colorbox Core Style:
    The following CSS is consistent between example themes and should not be altered.
*/
  #colorbox,
  #cboxOverlay,
  #cboxWrapper {
    position: absolute;
    top: 0;
    left: 0;
    z-index: 9999;
    overflow: hidden;
    -webkit-transform: translate3d(0, 0, 0);
  }

  #cboxWrapper {
    max-width: none;
  }

  #cboxOverlay {
    position: fixed;
    width: 100%;
    height: 100%;
  }

  #cboxMiddleLeft,
  #cboxBottomLeft {
    clear: left;
  }

  #cboxContent {
    position: relative;
  }

  #cboxLoadedContent {
    overflow: auto;
    -webkit-overflow-scrolling: touch;
  }

  #cboxTitle {
    margin: 0;
  }

  #cboxLoadingOverlay,
  #cboxLoadingGraphic {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
  }

  #cboxPrevious,
  #cboxNext,
  #cboxClose,
  #cboxSlideshow {
    cursor: pointer;
  }

  .cboxPhoto {
    float: left;
    margin: auto;
    border: 0;
    display: block;
    max-width: none;
    -ms-interpolation-mode: bicubic;
  }

  .cboxIframe {
    width: 100%;
    height: 100%;
    display: block;
    border: 0;
    padding: 0;
    margin: 0;
  }

  #colorbox,
  #cboxContent,
  #cboxLoadedContent {
    box-sizing: content-box;
    -moz-box-sizing: content-box;
    -webkit-box-sizing: content-box;
  }

  /* 
    User Style:
    Change the following styles to modify the appearance of Colorbox.  They are
    ordered & tabbed in a way that represents the nesting of the generated HTML.
*/
  #cboxOverlay {
    background: #000;
    opacity: 0.9;
    filter: alpha(opacity=90);
  }

  #colorbox {
    outline: 0;
  }

  #cboxTopLeft {
    width: 14px;
    height: 14px;
    background: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/controls.png) no-repeat 0 0;
  }

  #cboxTopCenter {
    height: 14px;
    background: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/border.png) repeat-x top left;
  }

  #cboxTopRight {
    width: 14px;
    height: 14px;
    background: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/controls.png) no-repeat -36px 0;
  }

  #cboxBottomLeft {
    width: 14px;
    height: 43px;
    background: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/controls.png) no-repeat 0 -32px;
  }

  #cboxBottomCenter {
    height: 43px;
    background: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/border.png) repeat-x bottom left;
  }

  #cboxBottomRight {
    width: 14px;
    height: 43px;
    background: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/controls.png) no-repeat -36px -32px;
  }

  #cboxMiddleLeft {
    width: 14px;
    background: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/controls.png) repeat-y -175px 0;
  }

  #cboxMiddleRight {
    width: 14px;
    background: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/controls.png) repeat-y -211px 0;
  }

  #cboxContent {
    background: #fff;
    overflow: visible;
  }

  .cboxIframe {
    background: #fff;
  }

  #cboxError {
    padding: 50px;
    border: 1px solid #ccc;
  }

  #cboxLoadedContent {
    margin-bottom: 5px;
  }

  #cboxLoadingOverlay {
    background: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/loading_background.png) no-repeat center center;
  }

  #cboxLoadingGraphic {
    background: url(https://cdn.thegioididong.com/v2015/Content/desktop/images/loading.gif) no-repeat center center;
  }

  #cboxTitle {
    position: absolute;
    bottom: -25px;
    left: 0;
    text-align: center;
    width: 100%;
    font-weight: bold;
    color: #7C7C7C;
  }

  #cboxCurrent {
    position: absolute;
    bottom: -25px;
    left: 58px;
    font-weight: bold;
    color: #7C7C7C;
  }

  /* these elements are buttons, and may need to have additional styles reset to avoid unwanted base styles */
  #cboxPrevious,
  #cboxNext,
  #cboxSlideshow,
  #cboxClose {
    border: 0;
    padding: 0;
    margin: 0;
    overflow: visible;
    position: absolute;
    bottom: -29px;
    background: url(https://cdn.tgdd.vn/v2015/Content/desktop/images/controls.png) no-repeat 0px 0px;
    width: 23px;
    height: 23px;
    text-indent: -9999px;
  }

  /* avoid outlines on :active (mouseclick), but preserve outlines on :focus (tabbed navigating) */
  #cboxPrevious:active,
  #cboxNext:active,
  #cboxSlideshow:active,
  #cboxClose:active {
    outline: 0;
  }

  #cboxPrevious {
    left: 0px;
    background-position: -51px -25px;
  }

  #cboxPrevious:hover {
    background-position: -51px 0px;
  }

  #cboxNext {
    left: 27px;
    background-position: -75px -25px;
  }

  #cboxNext:hover {
    background-position: -75px 0px;
  }

  #cboxClose {
    right: 0;
    background-position: -100px -25px;
  }

  #cboxClose:hover {
    background-position: -100px 0px;
  }

  .cboxSlideshow_on #cboxSlideshow {
    background-position: -125px 0px;
    right: 27px;
  }

  .cboxSlideshow_on #cboxSlideshow:hover {
    background-position: -150px 0px;
  }

  .cboxSlideshow_off #cboxSlideshow {
    background-position: -150px -25px;
    right: 27px;
  }

  .cboxSlideshow_off #cboxSlideshow:hover {
    background-position: -125px 0px;
  }

  /* 10:24:33 19/02/2020 */
  .rightInfo {
    float: left
  }

  .rightInfo.phone {
    float: right;
    width: 22.5%;
    overflow: visible;
    background: #fff;
    position: relative
  }

  .checkexist {
    background: #fff;
    position: relative
  }

  .checkexist .layerstore {
    position: absolute;
    display: none;
    width: 280px;
    left: -31px;
    padding: 10px;
    background: #fff;
    border: 1px solid #ccc;
    -moz-border-radius: 4px;
    -webkit-border-radius: 4px;
    border-radius: 4px;
    z-index: 9;
    box-shadow: 0 3px 10px 0 rgba(0, 0, 0, .3)
  }

  .checkexist .layerstore:after,
  .checkexist .layerstore:before {
    top: -20px;
    left: 35px;
    border: solid transparent;
    content: " ";
    height: 0;
    width: 0;
    position: absolute;
    pointer-events: none
  }

  .checkexist .layerstore:before {
    border-color: rgba(238, 238, 238, 0);
    border-bottom-color: #fff;
    border-width: 11px;
    margin-left: -11px;
    z-index: 1
  }

  .checkexist .layerstore:after {
    border-color: rgba(255, 255, 255, 0);
    border-bottom-color: #dfdfdf;
    border-width: 10px;
    margin-left: -10px
  }

  .checkexist strong {
    display: block;
    font-size: 14px;
    color: #288ad6;
    padding: 5px 0 12px 0;
    font-weight: normal;
    cursor: pointer
  }

  .checkexist .listmarket strong {
    color: #333
  }

  .checkexist .scroll {
    display: block;
    overflow-y: auto;
    overflow-x: hidden;
    max-height: 160px
  }

  .checkexist aside {
    float: left;
    width: 50%
  }

  .checkexist,
  .likeshare {
    margin-right: 10px
  }

  .rightInfo.phone .policy {
    display: block;
    overflow: hidden;
    border: 1px solid #ddd;
    border-radius: 3px;
    padding-bottom: 5px;
    margin: 0 0 10px 0;
    padding-top: 10px
  }

  .rightInfo.phone .policy li {
    display: block;
    overflow: hidden;
    padding: 5px 0 5px 28px;
    font-size: 14px;
    color: #333;
    line-height: 20px;
    margin: 0 10px;
    border-bottom: solid 1px #f0f0f0;
    position: relative
  }

  .rightInfo.phone .policy li:first-child {
    padding-top: 0;
    min-height: 30px
  }

  .rightInfo.phone .policy li::before {
    margin-left: 0
  }

  .rightInfo.phone .policy li a {
    color: #288ad6
  }

  .rightInfo.phone .policy li a:hover {
    text-decoration: underline
  }

  .rightInfo.phone .policy li b,
  .rightInfo.phone .policy li strong {
    font-weight: normal
  }

  .rightInfo.phone .policy li:last-child {
    border-bottom: none
  }

  .rightInfo.phone .policy.nobefore li:last-child:before {
    display: none
  }

  .rightInfo.phone .policy li.timeship {
    display: none
  }

  .rightInfo.phone .policy li .icon-poltick {
    content: '';
    background: url(/Content/desktop/images/V4/game/1-doi-1@2x.png) 0 0 no-repeat;
    width: 16px;
    height: 18px;
    background-size: 16px 18px;
    position: absolute;
    display: block;
    top: 8px;
    left: 3px
  }

  .rightInfo.phone .policy .inpr:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/trong-hop-co@2x.png) 0 0 no-repeat;
    width: 19px;
    height: 16px;
    background-size: 19px 16px;
    position: absolute;
    display: block;
    top: 4px;
    left: 0
  }

  .rightInfo.phone .policy .wrpr:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/bao-hanh-chinh-hang@2x.png) 2px 0 no-repeat;
    width: 19px;
    height: 23px;
    background-size: 16px 23px;
    position: absolute;
    display: block;
    top: 4px;
    left: 0
  }

  .rightInfo.phone .policy .shpr:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/giao-hang@2x.png) 2px 0 no-repeat;
    width: 24px;
    height: 16px;
    background-size: 22px 16px;
    position: absolute;
    display: block;
    top: 8px;
    left: -3px
  }

  .rightInfo.phone .policy .shpr span strong {
    color: #e10c00;
    font-weight: bold
  }

  .rightInfo.phone .policy .shpr span strong.f {
    color: #e10c00;
    font-weight: normal
  }

  .rightInfo.phone .policy .chpr:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/1-doi-1@2x.png) 0 0 no-repeat;
    width: 18px;
    height: 20px;
    background-size: 18px 20px;
    position: absolute;
    display: block;
    top: 8px;
    left: 0
  }

  .rightInfo.phone .policy .ghOLpr:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/giao-hang-online@2x.png) 0 0 no-repeat;
    width: 30px;
    height: 20px;
    background-size: 25px 15px;
    position: absolute;
    display: block;
    top: 8px;
    left: -2px
  }

  .rightInfo.phone .policy .ghOLpr span strong {
    font-weight: bold
  }

  .rightInfo.phone .policy .tnpr:before {
    content: '';
    background: url(/Content/desktop/images/V4/game/trai-nghiem@2x.png) 0 0 no-repeat;
    width: 30px;
    height: 20px;
    background-size: 23px 17px;
    position: absolute;
    display: block;
    top: 8px;
    left: 0
  }

  .rightInfo.phone .policy li.csw {
    padding: 5px
  }

  .rightInfo.phone .policy li.csw p {
    border-bottom: solid 1px #f0f0f0;
    padding: 10px 0
  }

  .rightInfo.phone .policy li.csw p:first-child {
    padding: 0 0 10px
  }

  .rightInfo.phone .policy li.csw p:last-child {
    border-bottom: none;
    padding: 10px 0 0
  }

  .rightInfo.phone .policy li.csw:before {
    background: unset;
    content: unset
  }

  .promote {
    margin: 20px 0 10px;
    padding: 20px 10px 10px;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: 1px solid #ddd;
    position: relative
  }

  .promote b {
    display: block;
    padding: 2px 8px;
    position: absolute;
    background: #fff9b4;
    border: solid 1px #e8dd58;
    text-align: center;
    top: -10px;
    left: 10px;
    font-size: 12px;
    font-weight: normal;
    line-height: 1.4;
    border-radius: 2px
  }

  .promote a {
    display: inline-block;
    color: #288ad6
  }

  .promote strong {
    color: #d0021b
  }

  .promote span {
    display: block;
    line-height: 20px;
    padding: 0 10px 0 20px;
    margin-bottom: 5px
  }

  .promote span:last-child {
    margin: 0
  }

  .promote span:before {
    content: '';
    margin-left: -20px;
    background: url(/Content/desktop/images/V4/game/check@2x.png);
    width: 14px;
    height: 14px;
    background-size: 14px 14px;
    margin-right: 0;
    float: left;
    margin-top: 2px
  }

  .productOld {
    border: solid 1px #ddd;
    padding: 10px 12px 10px 12px;
    margin-bottom: 10px;
    border-radius: 3px;
    position: relative
  }

  .productOld .viewold {
    margin-top: 0
  }

  .productOld .viewold div {
    display: block;
    overflow: hidden;
    color: #333;
    margin-top: 3px
  }

  .productOld .viewold div span {
    display: block;
    line-height: 22px;
    color: #333
  }

  .productOld .viewold div span strong {
    color: #e10c00
  }

  .productOld .viewold div label.installment {
    position: absolute;
    right: 10px;
    bottom: 5px
  }

  .boxFlashSales {
    padding: 10px;
    border-top: none;
    overflow: hidden
  }

  .boxFlashSales .box-flash-head strong {
    display: inline-block;
    overflow: hidden;
    font-size: 24px;
    color: #e10c00;
    vertical-align: middle;
    margin-right: 10px
  }

  .boxFlashSales .box-flash-head {
    margin: -10px 0 10px 0;
    overflow: hidden
  }

  .boxFlashSales .box-flash-head span.hisprice-flash {
    display: inline-block;
    vertical-align: middle;
    font-size: 18px;
    color: #999;
    text-decoration: line-through;
    margin-right: 10px
  }

  .boxFlashSales .box-promo-flash {
    display: block;
    overflow: hidden;
    border: 1px solid #ddd;
    border-radius: 4px;
    position: relative;
    margin: 5px 10px 12px;
    background: #fff;
    padding-bottom: 10px;
    margin-top: 20px
  }

  .boxFlashSales .box-promo-flash strong {
    display: block;
    overflow: hidden;
    font-size: 15px;
    color: #333;
    padding: 15px 15px 10px 15px;
    text-transform: uppercase
  }

  .boxFlashSales .box-promo-flash .infopr span {
    display: block;
    overflow: hidden;
    font-size: 14px;
    color: #333;
    padding: 0 15px 5px 40px
  }

  .boxFlashSales .box-promo-flash .infopr span:before {
    content: '';
    margin-left: -20px;
    background: url(/Content/desktop/images/V4/game/check@2x.png);
    width: 14px;
    height: 14px;
    background-size: 14px 14px;
    margin-right: 0;
    float: left;
    margin-top: 2px
  }

  .boxFlashSales .box-button-flash {
    margin: 5px 10px 12px
  }

  .boxFlashSales .box-button-flash a {
    padding: 15px 10px;
    background: #d0021b;
    text-align: center;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    color: #fff;
    font-weight: bold;
    font-size: 15px;
    display: block;
    position: relative;
    top: 2px;
    right: 0
  }

  .boxFlashSales .box-button-flash a i {
    font-style: normal;
    font-size: 14px;
    display: block;
    bottom: 3px;
    font-weight: normal;
    left: 0;
    right: 0
  }

  .boxFlashSales .box-fullOrder {
    padding: 10px;
    background: #ffd9d7;
    -moz-border-radius: 3px;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    border: 1px solid #f00;
    position: relative;
    overflow: hidden
  }

  .boxFlashSales .box-fullOrder span {
    margin-left: 25px;
    float: right
  }

  .boxFlashSales .box-fullOrder i:before {
    content: '';
    width: 14px;
    background-size: contain;
    background-repeat: no-repeat;
    position: absolute;
    left: 10px;
    height: 30px;
    top: 35%;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAA8CAYAAAB1odqiAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAALaSURBVHgBtVjRcdpAEH0SykxmzAdpIJY6iDsgJaSCmAoyqSC4giQVxB24hOAKTCqAjBvgA2YyY9BlV0gYpNu7PXG8HxvppMe+27e7R4KIWIwwGmzxYAzy8g1uihVW7TUpIiJ9wXcDjJEgxxYfrGsQCYsr3BLR7eFChjkuRbh4i5xe9O3o0twmZzTCdEBkLGONEngU1+JMdKRkJJjhEoQWKfd4se/f2YRtKWvMi39Yis+gJ56v8KUjJSExcnS9CVnKMsFUuP2I2IRphgf6M7Ld2yFyhM/DKkmsVQQGy2ITkbCSEqKUIJn/wIMgQsrK384FRvZfMGElZdcCbcw89+kVClQGz7DwLFtdr/HOs0YXoVdKuOtnEKFSStX+eQkXQ4xdWXmCxG2H12USGY0L1MGfVNERaP9U+SBGyOOClsxAJ6dIaO1xbkJVwlgJxR7nxky7sEMo9Dg3Ml3CdAhDpWTw/kkDkw2HzKqkZIOHRqcFdRIq7pNDhL2kDMH+3eMqQh4XiP0HLgmOcIePSV2YnyB08FigWWfyfoP71DUuxAKVx59Mxv+nFOpFyVhKss20+ZixrnQhVzyYpwl+IRCcmce2yeqhdel7sPJoKBlJWaxPq5B6xBgk+IwQtKRsoGopjL9DLip6lFsUtpFfFSE3YgSApLyTzhe6mcYEyMnD8FqeErR7OFauQ5X1DngJuRJpa6xLygYZfBgoo9ufK6a+Zd4ItXbwSakmNIr900jZwOlDtgN9I98BZnm9QQElnBFq7KCVUkUIj5whUjaQJ2//iWlO0/YNAiFH6LbDimrlJ/SASOiyQ2nCpWwgSip1B55D83VYohzDWmnE7kAWMDtMcAaskkp2SNBfSichLHagMe++mbyiElq7A0m52+EOEdCN0GKHGFKKhG07xJLy8L72hRM71OeBWNExTs+HLTvElNJKeGyH2FJaCSmk/c+SEbPSSVj/fLUqU3yNLWWD/02l9svoZnwJAAAAAElFTkSuQmCC)
  }

  .box-fullOrder a {
    color: #288ad6
  }

  .area_order .buy_now.red {
    background: #e10c00;
    position: relative
  }

  .area_order .buy_now.blue-install {
    background: #288ad6;
    margin-top: 10px;
    position: relative
  }

  .area_order .buy_now.red * {
    padding-left: 14px
  }

  .area_order .buy_now.red:before,
  .area_order .buy_now.blue-install:before {
    content: '';
    width: 14px;
    background-size: contain;
    background-repeat: no-repeat;
    position: absolute;
    left: 31%;
    height: 30px;
    top: 10px;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAA8CAYAAAB1odqiAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAMKSURBVHgBtZhfTttAEMa/MW4TWirRN0KjKtwAbpAeoScoOUHVExBO0PYE5QYcoeYEpCfAUhOFR6RSESrs6W6MSeTsn9mw+b0ksdfzZT7PZMchRISvdnfv2zvnAPVasz9HdHBz01yTICL/Xr3+ql76Sro3a+8cmtZEE7ybvjvmko7rz+3Z7QibEryb7vUIycnTAeKRyc5ogkmydaJtfDrwQBfWtXgmTSs1BRUZNiG4YmUdNOERNiG4YqVG3b/tznVuvQZrMrt+/7lpZaWHkeu6tQS1lUA5NJ0rC1wgtmDC6TkYu6ZzBdwZpgjkfto9YeDQfJbzne4knqXaSiU2tJ0vmX7BQ5Ag4cVPdzDOEEtQW7nSAg0eSmTwQBBQNXh65QxEuGntjd/CgyhDn5WaonS3g1hQYmUVyH//qnUO7n53+66qXIaJRpJ11ntYjQtvLiXZadqdsagerBlW44JMTJEJ15kFTXucCxYWjFHQtsd5omTypc0Dpj3Og21g8gqGWvlIZhuYTNBCTFupGzwsOzmUM3jwlOE6VoahYpfozzPU44IqtW/YKKwyLD7Q3EpKL207eDS5ggfb3clZ4hoX4qnhuxbTbxMm3qyYsrJ1fzusP6XaV/XSE1yoqph+IBAGDZbbJn0cWnPfhbpHEYq2cn+cLR8ST20qu08IQlv5d7gaR8hs2mUEwHg4MI38ohFDb8QIQH2zU9vzhUgweckBdnK+3RkPrbEgCVEmfQipqt6OV7B6cJH9xrqsrBFU6VYfIrSVk6FvlTdDaTv4rBQLYv6/i0/Mb2WNsw91O1AKz9TNebszOYAQZ4aSdpBaKRL0tUOIlTVWS31PTMQ8au1PjhCIoy0c7aAezUoUH7EGiT2mox1KDrZyEdeCY3fI1INLUKEsY7TUvjvMJ68BnoHRUls7cIG1rXQKmtqBwGf15BVV0Lw7cK6q8hQRMGS42g4xrKxZKZpmO2gr2xGsrDHdw/7ibTwrjYLNdohppVFwuR1iVaVTkAt6/FsyvpVGwRLq3wj1w0xl+SW2lTX/Afb1Uo5ghIiiAAAAAElFTkSuQmCC)
  }

  .area_order .buy_now.blue-install:before {
    left: 18%
  }

  .box-flash-count {
    height: 20px;
    background: #f9d1bd;
    border-radius: 30px;
    position: relative;
    margin: 5px 10px 12px
  }

  .box-flash-count .flash_count {
    height: 20px;
    background: #f9d1bd;
    border-radius: 30px;
    position: relative;
    margin-left: 10px;
    overflow: hidden
  }

  .box-flash-count i:before {
    content: '';
    width: 24px;
    height: 24px;
    background: #e10c00 url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAaCAYAAACzdqxAAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAFWSURBVHgBrVWBcYMwDDRdoN6gHoERPAIb1N0gnSBsUHeCsEFGSDZIOwHdgHYCVQJxMY6RIeHvdNiW/i0sgZXKAAAc2l5tDRTdwYAjmlZbAcU8XHFBM2oLoNAJprhskjmKdHCLg3oEKFDCPBzHrM+eMhOE6U00F7eKuU8ZbSv4KFOH9otGCZRJYd5dB3MiGZXf2PAm6XbERYtWB/MW8qCYUzD/SAkf6Nx4vIf7YWLhlh1WIDWQhw9FXeDoBNILWg0y+m5Zc569MMf7TJwbi5bLoEfUQa3A8dRur0rGOz/P40JRFNS7bwLHkHApBHyhSMPj79CB62c1fBwpPOeEP/n5g9YI/hh/Sjin4xgVjkMI9dlJHWGYrGHm507rs1xIt87i/+0sl3eNP4rqTuFu8nZwvTBH2IWiOuK5VFC9NmOYFs9JgRUMxfQLhT3H2yXBZoUwHWHyzvsH6WilcWhbn1sAAAAASUVORK5CYII=);
    border-radius: 50%;
    background-repeat: no-repeat;
    background-position: center center;
    position: absolute;
    left: -2px;
    top: -2px;
    z-index: 2;
    background-size: 11px 13px
  }

  .box-flash-count .flash_count div {
    position: absolute;
    height: 20px;
    left: 0;
    top: 0;
    background: linear-gradient(90deg, #ff9c00 0%, #ec1f1f 100%);
    border-radius: 30px 0 0 30px
  }

  .flash_count span {
    display: block;
    position: relative;
    z-index: 2;
    font-weight: bold;
    text-align: center;
    font-size: 12px;
    line-height: 20px;
    color: #000
  }

  @media screen and (max-width:900px) {
    .area_order .buy_now.red:before {
      left: 28%
    }

    .area_order .buy_now.blue-install:before {
      left: 13%
    }

    .box-flash-count {
      margin: 0
    }

    .boxFlashSales {
      padding: 10px 10px 0 10px
    }

    .boxFlashSales .box-promo-flash {
      margin: 5px 0 12px;
      margin-top: 12px
    }

    .boxFlashSales .box-fullOrder {
      margin-bottom: 10px
    }

    .area_order {
      margin: 10px 0 0 0
    }
  }

  .rowdetail.fs .picture {
    width: 42%
  }

  .rowdetail.fs .picture img {
    max-width: 100%;
    width: auto
  }

  .rowdetail.fs .price_sale {
    margin: 0 1%;
    width: 33%
  }

  .rowdetail.fs .boxFlashSales {
    padding: 10px 0;
    overflow: visible
  }

  .rowdetail.fs .boxFlashSales .box-flash-head,
  .rowdetail.fs .boxFlashSales .box-fullOrder {
    margin-left: 10px;
    margin-right: 10px
  }

  .rowdetail.fs .option-shiper {
    margin: 10px
  }

  .buy_repay.fs {
    position: relative
  }

  .buy_repay.fs * {
    padding-left: 14px
  }

  .buy_repay.fs:before {
    content: '';
    width: 14px;
    background-size: contain;
    background-repeat: no-repeat;
    position: absolute;
    left: 26%;
    height: 30px;
    top: 10px;
    background-image: url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABwAAAA8CAYAAAB1odqiAAAACXBIWXMAABYlAAAWJQFJUiTwAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAMKSURBVHgBtZhfTttAEMa/MW4TWirRN0KjKtwAbpAeoScoOUHVExBO0PYE5QYcoeYEpCfAUhOFR6RSESrs6W6MSeTsn9mw+b0ksdfzZT7PZMchRISvdnfv2zvnAPVasz9HdHBz01yTICL/Xr3+ql76Sro3a+8cmtZEE7ybvjvmko7rz+3Z7QibEryb7vUIycnTAeKRyc5ogkmydaJtfDrwQBfWtXgmTSs1BRUZNiG4YmUdNOERNiG4YqVG3b/tznVuvQZrMrt+/7lpZaWHkeu6tQS1lUA5NJ0rC1wgtmDC6TkYu6ZzBdwZpgjkfto9YeDQfJbzne4knqXaSiU2tJ0vmX7BQ5Ag4cVPdzDOEEtQW7nSAg0eSmTwQBBQNXh65QxEuGntjd/CgyhDn5WaonS3g1hQYmUVyH//qnUO7n53+66qXIaJRpJ11ntYjQtvLiXZadqdsagerBlW44JMTJEJ15kFTXucCxYWjFHQtsd5omTypc0Dpj3Og21g8gqGWvlIZhuYTNBCTFupGzwsOzmUM3jwlOE6VoahYpfozzPU44IqtW/YKKwyLD7Q3EpKL207eDS5ggfb3clZ4hoX4qnhuxbTbxMm3qyYsrJ1fzusP6XaV/XSE1yoqph+IBAGDZbbJn0cWnPfhbpHEYq2cn+cLR8ST20qu08IQlv5d7gaR8hs2mUEwHg4MI38ohFDb8QIQH2zU9vzhUgweckBdnK+3RkPrbEgCVEmfQipqt6OV7B6cJH9xrqsrBFU6VYfIrSVk6FvlTdDaTv4rBQLYv6/i0/Mb2WNsw91O1AKz9TNebszOYAQZ4aSdpBaKRL0tUOIlTVWS31PTMQ8au1PjhCIoy0c7aAezUoUH7EGiT2mox1KDrZyEdeCY3fI1INLUKEsY7TUvjvMJ68BnoHRUls7cIG1rXQKmtqBwGf15BVV0Lw7cK6q8hQRMGS42g4xrKxZKZpmO2gr2xGsrDHdw/7ibTwrjYLNdohppVFwuR1iVaVTkAt6/FsyvpVGwRLq3wj1w0xl+SW2lTX/Afb1Uo5ghIiiAAAAAElFTkSuQmCC)
  }

  section.fsmb .promote {
    margin-left: 10px;
    margin-right: 10px
  }

  section.fsmb .area_order {
    margin-left: 10px;
    margin-right: 10px
  }
</style>

<section class="type0">
  <ul class="breadcrumb">
    <li>
      <a href="/" title="Trang chủ">
        Trang chủ </a>
      <span>›</span>
    </li>
    <li>
      <a href="/dtdd">
        Điện thoại </a>
      <span>›</span>
    </li>
    <li class="brand">
      <a href="/dtdd-samsung">
        Samsung </a>
    </li>
  </ul>
  <div class="rowtop">
    <h1>Điện thoại Samsung Galaxy A31</h1>
    <div class="ratingresult">
      <span class="star"><i class="icontgdd-star"></i></span>
      <span class="star"><i class="icontgdd-star"></i></span>
      <span class="star"><i class="icontgdd-star"></i></span>
      <span class="star"><i class="icontgdd-star"></i></span>
      <span><i class="icontgdd-star"></i></span>
      <a href="#danhgia">24 đánh giá</a>
    </div>
    <div class="likeshare">
      <div id="fb-root"></div>
      <div class="fb-like" data-href="/dtdd/samsung-galaxy-a31" data-layout="button_count" data-action="like"
        data-show-faces="true" data-share="true"></div>
    </div>
  </div>
  <div class="clr"></div>
  <div class="rowdetail " id="normalproduct">
    <aside class="picture">
      <div class="icon-position">
        <img src="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-400x460-400x460.png"
          alt="Điện thoại Samsung Galaxy A31" onclick="gotoGallery(-1,0);">
      </div>
      <span class="text-viewimage">Xem hình thực tế sản phẩm</span>
      <div class="colorandpic">
        <ul class="owl-carousel owl-theme tabscolor">
          <li onclick="gotoGallery(1,4)" class="item">
            <div>
              <img class="" src="//cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-xanh-200x200-180x125.png">
            </div>
            Xanh Dương
          </li>
          <li onclick="gotoGallery(1,11)" class="item">
            <div>
              <img class="" src="//cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-den-200x200-180x125.png">
            </div>
            Đen
          </li>
          <li onclick="gotoGallery(1,12)" class="item">
            <div>
              <img class="" src="//cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-trang-200x200-180x125.png">
            </div>
            Trắng
          </li>
          <!--#region Đưa video lên kế bộ ảnh màu, với dt,tablet,laptop-->
          <!--#endrergion-->
          <li onclick="gotoGallery(7,0)" class="item">
            <div>
              <i class="icontgdd-box"></i>
            </div>
            Mở hộp,<br>
            k.mãi
          </li>
          <li onclick="PopupGallery(5)" class="item">
            <div>
              <i class="icontgdd-360"></i>
            </div>
            Hình 360<br>
            độ
          </li>
        </ul>
        <div class="prev hide" onclick="slideFltNext(0)"><i class="icontgdd-prevthumd"></i></div>
        <div class="next hide" onclick="slideFltNext(1)"><i class="icontgdd-nextthumd"></i></div>
      </div>
      <div class="wrap_rtglr hide">
        <div class="pop">
          <div class="hdpop">Phản hồi không hài lòng <span>bộ ảnh</span> <a href="javascript:closeRtGlr();"
              class="closehd"><i class="iconcom-close"></i></a></div>
          <div class="ctpop">
            <div class="bifRtCt  hide">
              <p>Mời bạn góp ý để chúng tôi phục vụ tốt hơn</p>
              <textarea name="txtContent" rows="3"
                placeholder="Vui lòng nhập nội dung góp ý (tối thiểu 30 ký tự)"></textarea>
              <span>Hãy để lại thông tin để được hỗ trợ khi cần thiết (Không bắt buộc):</span>
              <div class="ifRtGd" data-val="">
                <label onclick="rtAtcChangeGder(1)" class="ifGdM "><i></i>Anh</label>
                <label onclick="rtAtcChangeGder(2)" class="ifGdFm"><i></i>Chị</label>
              </div>
              <input type="text" name="txtFullName" placeholder="Họ tên" value="">
              <input type="text" name="txtPhoneNumber" placeholder="Số điện thoại" value="" style="display:none;">
              <input type="text" name="txtEmail" placeholder="Email" value="" style="display:none;">
              <button type="submit" onclick="sendRatingContent(-1)">Gửi góp ý<span>Cam kết bảo mật thông tin cá
                  nhân</span></button>
              <label class="alert"></label>
              <input type="hidden" name="hdRateType" value="5">
              <input type="hidden" name="hdVideoUrl" value="">
            </div>
          </div>
        </div>
      </div>
      <div class="slide_FT"></div>
    </aside>
    <aside class="price_sale">
      <div class="area_price">
        <strong>6.490.000₫</strong>
        <label class="installment">Trả góp 0%</label>
        <span></span>
      </div>
      <style>
        .boxFlashSales .box-fullOrder.tesaerflashsale span {
          float: none;
        }

        .boxFlashSales .box-fullOrder.tesaerflashsale span a {
          color: #333;
        }

        .boxFlashSales .box-fullOrder.tesaerflashsale i:before {
          top: 15%;
        }
      </style>
      <div class="area_promotion once  zero ">
        <strong data-count="1">Khuyến mãi</strong>
        <div class="infopr">
          <span class="pro569044 " data-g="WebNote" data-date="5/31/2020 11:00:00 PM" data-return="" data-fromvalue="0"
            data-tovalue="0">
            Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác) <a
              href="https://www.thegioididong.com/tin-tuc/dong-ho-giam-gia-thang-moi-1246102" target="_blank">(click xem
              chi tiết)</a>
          </span>
        </div>
        <div class="vipservice">
          <b>Chọn thêm các dịch vụ <b>miễn phí chỉ có ở TGDĐ</b></b>
          <div class="o1">
            <a href="javascript:;" class="first check" onclick="VIPService($(this), 1)"><i
                class="iconmobile-checkbox"></i><span>Giao ngay từ cửa hàng gần bạn nhất</span></a>
            <input id="IsDeliveryImmediately" name="IsDeliveryImmediately" type="hidden" value="true">
          </div>
          <div class="o2">
            <a href="javascript:;" class="first " onclick="VIPService($(this), 2)"><i
                class="iconmobile-checkbox"></i><span>Chuyển danh bạ, dữ liệu qua máy mới</span></a>
            <input id="IsTransferContactsOrGuide" name="IsTransferContactsOrGuide" type="hidden" value="false">
          </div>
          <div class="notemoreproduct">
            <div class="first " onclick="VIPService($(this), 3)">
              <i class="iconmobile-checkbox"></i><span>Mang nhiều màu để bạn lựa chọn</span>
            </div>
            <div class="last">
              <div class="addmore">
                <div>Chọn màu sản phẩm (không mua không sao)</div>
                <ul class="listmorecolor">
                  <li data-value="0131491002030">
                    <div>
                      <img width="40" height="40"
                        src="//cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-xanh-200x200-180x125.png">
                    </div>
                    <i class="iconmobile-radiosim"></i>
                    Xanh Dương
                  </li>
                  <li data-value="0131491002031">
                    <div>
                      <img width="40" height="40"
                        src="//cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-den-200x200-180x125.png">
                    </div>
                    <i class="iconmobile-radiosim"></i>
                    Đen
                  </li>
                  <li data-value="0131491002032">
                    <div>
                      <img width="40" height="40"
                        src="//cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-trang-200x200-180x125.png">
                    </div>
                    <i class="iconmobile-radiosim"></i>
                    Trắng
                  </li>
                </ul>
              </div>
            </div>
            <input id="IsNoteMoreColorProduct" name="IsNoteMoreColorProduct" type="hidden" value="false">
            <input id="IsNoteMoreProductCode" name="IsNoteMoreProductCode" type="hidden" value="">
          </div>
          <div class="o3">
            <a href="javascript:;" class="first " onclick="VIPService($(this), 4)"><i
                class="iconmobile-checkbox"></i><span>Mang thêm điện thoại khác để bạn xem</span></a>
            <div class="form">
              <input name="NoteProductOther" maxlength="72" placeholder="Nhập tên điện thoại bạn muốn xem">
              <input id="IsNoteProductOther" name="IsNoteProductOther" type="hidden" value="false">
            </div>
          </div>
        </div>
        <script async="" src="//www.google-analytics.com/analytics.js"></script>
        <script type="text/javascript">
          setTimeout(function () {
                      $(document).on('click', 'ul.listmorecolor li', function () {
                          $(this).toggleClass('choosed');
                          var productCodes = '';
                          $('ul.listmorecolor li.choosed').each(function () {
                              productCodes += $(this).data('value') + ',';
                          });
                          $('input[name=IsNoteMoreProductCode]').val(productCodes);
                          GetUrlOrder();
                      });
                      $(document).on('keyup', 'input[name=NoteProductOther]', function () {
                          GetUrlOrder();
                      });
                  }, 1000);
                  
                  function VIPService($this, type) {
                      $this.toggleClass('check');
                      if (type == 1) {
                          $('input[name=IsDeliveryImmediately]').val($this.hasClass('check') ? 'true' : 'false');
                      } else if (type == 2) {
                          $('input[name=IsTransferContactsOrGuide]').val($this.hasClass('check') ? 'true' : 'false');
                          $('input[name=IsTechSupportShiper]').val($this.hasClass('check') ? '1' : '0');
                      } else if (type == 3) {
                          $('input[name=IsNoteMoreColorProduct]').val($this.hasClass('check') ? 'true' : 'false');
                          $this.next().slideToggle();
                      } else if (type == 4) {
                          $this.next().slideToggle();
                          $('input[name=IsNoteProductOther]').val($this.hasClass('check') ? 'true' : 'false');
                      }
                  
                      GetUrlOrder();
                  }
                  function GetUrlOrder() {
                      var isSupportTech = $('.option-shiper').hasClass('active') ? 1 : 0;
                      var isTransferContactsOrGuide = $('input[name=IsTransferContactsOrGuide]').val();
                      var isNoteMoreColorProduct = $('input[name=IsNoteMoreColorProduct]').val();
                      var isNoteMoreProductCode = $('input[name=IsNoteMoreProductCode]').val();
                      var isNoteProductOther = $('input[name=IsNoteProductOther]').val();
                      var noteProductOther = $('input[name=NoteProductOther]').val();
                      var urlOrder = '/them-vao-gio-hang?productId=' + $('.area_order .buy_now').data('value');
                      if (isSupportTech == '1') {
                          urlOrder += '&isTechSupportShiper=1';
                      }
                      if (isTransferContactsOrGuide == 'true') {
                          urlOrder += '&isTransferContactsOrGuide=true';
                      }
                      if (isNoteMoreColorProduct == 'true') {
                          urlOrder += '&isNoteMoreColorProduct=true&noteMoreProductCodes=' + isNoteMoreProductCode;
                      }
                      if (isNoteProductOther == 'true') {
                          urlOrder += '&isNoteProductOther=true&noteProductOther=' + noteProductOther;
                      }
                      $('.area_order .buy_now').attr('href', urlOrder);
                      console.log(urlOrder);
                  }
        </script>
      </div>
      <script>
        function ChoosePromtion(groupid, index, t) {
                  $('.pro' + groupid).removeClass('active');
                  $(t).addClass('active');
                  var protxt = $(t).find(".dscp u").html();
                  $('.notechoose').html('Bạn chọn khuyến mãi: ' + protxt).show();
                  BuyChoose();
              }
              
              function BuyChoose() {
                  $('.buy_now').unbind("click");
                  if ($('.option-repay').hasClass('active')) {
                      $('.buy_now').unbind("click");
                      $('.buy_now').click(function () {
                          window.location.href = $('.buy_ins').attr('href');
                          return false;
                      });
                  }
                  else {
                      $('.buy_now').click(function () {
                          var paraPromotion = '';
                          $('.area_promotion .pro-chosse.active').each(function () {
                              paraPromotion += $(this).attr('data-group') + ";" + $(this).attr('data-index') + "$";
                          });
                          var url = $(this).attr('href');
                          if (paraPromotion != '') {
                              url += '&promotion=' + paraPromotion
                              $(this).attr('href', url);
                          }
                          if ($('.option-shiper').hasClass('active')) {
                              url += '&IsTechSupportShiper=1';
                              $(this).attr('href', url);
                          }
                      });
                  }
              }
              
      </script>
      <div class="notechoose"></div>
      <!-- #region Scenario -->
      <p class="quotation"><a href="javascript:;"
          onclick="$('.pop-quotation, .pop-quotation form').show();$('.q-success').hide()">Báo giá cao</a></p>
      <div class="pop-quotation">
        <form id="frmQuotation" onsubmit="return QuotationSubmit()">
          <a href="javascript:;" class="q-close" onclick="$('.pop-quotation').hide();"></a>
          <h3>BÁO GIÁ CAO</h3>
          <p>Cảm ơn quý khách đã thông báo. Vui lòng để lại thông tin để chúng tôi phục vụ tốt hơn.</p>
          <strong>Thông tin liên hệ</strong>
          <div class="q-gender">
            <span data-value="1" class=""><i></i><b>Anh</b></span>
            <span data-value="0" class=""><i></i><b>Chị</b></span>
            <input type="hidden" name="quotationGender" value="3">
          </div>
          <div class="inline q-name">
            <input type="text" name="quotationName" value="" placeholder="Họ và tên">
            <em>* Vui lòng nhập họ và tên</em>
          </div>
          <div class="inline q-phone">
            <input type="tel" name="quotationPhone" value="" placeholder="Số điện thoại">
            <em>* Vui lòng nhập số điện thoại</em>
          </div>
          <div class="inline q-email">
            <input type="text" name="quotationEmail" value="" placeholder="Email">
            <em>* Vui lòng nhập email</em>
          </div>
          <strong>Góp ý về giá sản phẩm</strong>
          <div class="q-note">
            <textarea rows="3" name="quotationNote" maxlength="300"
              placeholder="Mời bạn nhập góp ý về giá, khuyến mãi sản phẩm"></textarea>
            <em>* Vui lòng nhập góp ý về giá sản phẩm</em>
          </div>
          <strong>So sánh với nguồn nào trên thị trường</strong>
          <div class="q-source">
            <textarea rows="2" name="quotationSource" maxlength="300"
              placeholder="Mời nhập tên cửa hàng hoặc website có giá, khuyến mãi tốt hơn"></textarea>
            <em>* Vui lòng nhập nguồn so sánh giá</em>
          </div>
          <button type="submit">Gửi</button>
          <span>Thegioididong cam kết bảo mật thông tin.</span>
          <input type="hidden" name="quotationType" value="9">
        </form>
        <div class="q-success">
          <a href="javascript:;" class="q-close" onclick="$('.pop-quotation').hide();"></a>
          <h3><i></i>GỬI THÀNH CÔNG</h3>
          <p>Cảm ơn quý khách đã góp ý cho Thegioididong. Hệ thống đã ghi nhận góp ý của quý khách để ngày càng phục vụ
            tốt hơn.</p>
          <a href="javascript:;" onclick="$('.pop-quotation').hide();">Đóng</a>
          <span>Cửa sổ sẽ tự động đóng sau 5 giây.</span>
        </div>
      </div>
      <script type="text/javascript">
        setTimeout(function () {
                  $(document).on('click', '.q-gender span', function () {
                      $('input[name=quotationGender]').val($(this).data('value'));
                      $('.q-gender span.active').removeClass('active');
                      $(this).addClass('active');
                  });
                  $(document).on('keyup', 'input[name=quotationName], input[name=quotationPhone], input[name=quotationEmail], textarea[name=quotationNote], textarea[name=quotationSource]', function () {
                      $(this).parent().removeClass('error');
                  });
              
                  if (GetCookie('_highquotation').indexOf(productID) > -1) {
                      $('.quotation, .pop-quotation').remove();
                  }
              }, 1000);
              
              var parent = '.price_sale ';
              var flagQuotationSubmit = false;
              function QuotationSubmit() {
                  if (flagQuotationSubmit) return false;
                  flagQuotationSubmit = true;
              
                  var promotions = '';
                  $('.infopr span').each(function () {
                      promotions += $.trim($(this).text().replace('Xem chi tiết', '')) + '+';
                  });
              
                  var price = $(parent + '.area_price strong').html() == undefined ? $('.boxshockheader strong:first-child').html() : $(parent + '.area_price strong').html();
                  if ($('.memory a.item').length > 0) {
                      price = $('.memory a.item.active strong').html();
                  }
              
                  var note = $.trim($('textarea[name=quotationNote]').val());
                  var source = $.trim($('textarea[name=quotationSource]').val());
                  var description = note + '|' + source + '|' + price + '|' + $.trim(promotions).trimEnd('+');
              
                  var gender = $.trim($('input[name=quotationGender]').val());
                  var name = $.trim($('input[name=quotationName]').val());
                  var phone = $.trim($('input[name=quotationPhone]').val());
                  var email = $.trim($('input[name=quotationEmail]').val());
                  var link = encodeURI(window.location.href);
              
                  var isError = false;
                  if (name == '') { $('.q-name').addClass('error'); isError = true; }
                  if (phone == '') { $('.q-phone').addClass('error'); isError = true; }
                  if (email == '') { $('.q-email').addClass('error'); isError = true; }
                  if (note == '') { $('.q-note').addClass('error'); isError = true; }
                  if (source == '') { $('.q-source').addClass('error'); isError = true; }
                  if (isError) { flagQuotationSubmit = false; return false; }
              
                  var data = {
                      ct: description,
                      name: name,
                      phone: phone,
                      email: email,
                      gender: gender,
                      type: 9,
                      productID: productID,
                      lnk: link,
                      satisfationType: 0
                  };
              
                  $.ajax({
                      type: "POST",
                      cache: false,
                      data: data,
                      url: "/aj/ProductV4/SubmitRatingArticle/",
                      beforeSend: function (e) {
                          BeforeSendAjax();
                      },
                      success: function (e) {
                          if (e.res == -1) {
                              alert(e.mes);
                          } else {
                              $('.quotation').remove();
                              $('.pop-quotation form').hide();
                              $('.q-success').show();
                              setTimeout(function () {
                                  $('.pop-quotation').remove();
                              }, 5000);
                          }
                          EndSendAjax();
                      }
                  });
              
                  return false;
              }
              function GetCookie(cname) {
                var name = cname + "=";
                var ca = document.cookie.split(';');
                for(var i = 0; i < ca.length; i++) {
                  var c = ca[i];
                  while (c.charAt(0) == ' ') {
                    c = c.substring(1);
                  }
                  if (c.indexOf(name) == 0) {
                    return c.substring(name.length, c.length);
                  }
                }
                return "";
              }
      </script>
      <div class="VnpayText" style="border:none;margin: 0px 10px;">
        <img src="/Content/desktop/images/V4/cart/ZaloPay/logo-vnp@2x.png" alt="Thanh toán qua VNPay QR COde">
        <div>
          <p style="margin-top: -1px;">Nhập <span class="codeVNPay">TGDD</span> Giảm thêm <span class="cm">5% tối đa
              300.000đ</span> khi thanh toán bằng quét QRcode qua App của 15 ngân hàng hàng đầu. <a
              href="https://www.thegioididong.com/tin-tuc/huong-dan-mua-hang-bang-vnpayqr-thanh-toan-the-gioi-di-dong-1182819"
              target="_blank">Xem hướng dẫn và danh sách ngân hàng.</a></p>
        </div>
      </div>
      <style>
        .VnpayText {
          background: #E9F7FF;
          -moz-border-radius: 4px;
          -webkit-border-radius: 4px;
          border-radius: 4px;
          padding: 10px 15px;
          display: block;
          overflow: hidden;
          display: none;
        }

        .VnpayText img {
          display: block;
          float: left;
          width: 50px;
        }

        .VnpayText p {
          font-size: 13px;
          display: inline;
        }

        .VnpayText p a {
          color: #288ad6;
        }

        .VnpayText p span.cm {
          color: #e10c00;
          font-weight: 600;
        }

        .VnpayText p span.codeVNPay {
          font-weight: bold;
        }
      </style>
      <div class="area_order area_orderM">
        <a id="mua-ngay" href="/them-vao-gio-hang?ProductId=216174" class="buy_now" data-value="216174"><b>Mua
            ngay</b><span>Giao tận nơi hoặc nhận tại siêu thị</span></a>
        <a id="tra-gop" class="buy_repay " href="/tra-gop/dtdd/samsung-galaxy-a31"><b>Mua trả góp 0%</b><span>Thủ tục
            đơn giản</span></a>
        <a class="buy_repay s " href="/tra-gop/dtdd/samsung-galaxy-a31?m=credit"><b>Trả góp qua thẻ</b><span>Visa,
            Master, JCB</span></a>
      </div>
      <!-- #endregion -->
      <div class="callorder">
        <div class="ct">
          <span>Gọi đặt mua: <a href="tel:18001060">1800.1060</a> (miễn phí - 7:30-22:00)</span>
        </div>
      </div>
    </aside>
    <div class="rightInfo phone">
      <div class="checkexist ">
        <strong class="kthlbl" onclick="$('.layerstore').toggle()"><i class="iconshop-local"></i>Kiểm tra có hàng tại
          nơi bạn ở không? </strong>
        <div class="layerstore ">
          <div class="city">Hồ Chí Minh</div>
          <div class="listcity">
            <div class="searchlocal">
              <form>
                <input name="txtPro" id="txtPro" type="text" placeholder="Nhập tỉnh, thành để tìm nhanh">
                <button type="button" class="submit"><i class="iconmobile-search"></i></button>
              </form>
            </div>
            <div class="scroll">
              <aside><a data-value="3">Hồ Chí Minh</a><a data-value="5">Hà Nội</a><a data-value="9">Đà Nẵng</a><a
                  data-value="82">An Giang</a><a data-value="102">Bà Rịa - Vũng Tàu</a><a data-value="103">Bắc
                  Giang</a><a data-value="104">Bắc Kạn</a><a data-value="105">Bạc Liêu</a><a data-value="106">Bắc
                  Ninh</a><a data-value="107">Bến Tre</a><a data-value="108">Bình Định</a><a data-value="109">Bình
                  Dương</a><a data-value="110">Bình Phước</a><a data-value="111">Bình Thuận</a><a data-value="81">Cà
                  Mau</a><a data-value="7">Cần Thơ</a><a data-value="112">Cao Bằng</a><a data-value="6">Đắk Lắk</a><a
                  data-value="113">Đắk Nông</a><a data-value="114">Điện Biên</a><a data-value="8">Đồng Nai</a><a
                  data-value="115">Đồng Tháp</a><a data-value="116">Gia Lai</a><a data-value="117">Hà Giang</a><a
                  data-value="118">Hà Nam</a><a data-value="120">Hà Tĩnh</a><a data-value="121">Hải Dương</a><a
                  data-value="101">Hải Phòng</a><a data-value="122">Hậu Giang</a><a data-value="123">Hòa Bình</a><a
                  data-value="124">Hưng Yên</a></aside>
              <aside><a data-value="125">Khánh Hòa</a><a data-value="126">Kiên Giang</a><a data-value="127">Kon
                  Tum</a><a data-value="128">Lai Châu</a><a data-value="129">Lâm Đồng</a><a data-value="130">Lạng
                  Sơn</a><a data-value="131">Lào Cai</a><a data-value="132">Long An</a><a data-value="133">Nam
                  Định</a><a data-value="134">Nghệ An</a><a data-value="135">Ninh Bình</a><a data-value="136">Ninh
                  Thuận</a><a data-value="137">Phú Thọ</a><a data-value="138">Phú Yên</a><a data-value="139">Quảng
                  Bình</a><a data-value="140">Quảng Nam</a><a data-value="141">Quảng Ngãi</a><a data-value="142">Quảng
                  Ninh</a><a data-value="143">Quảng Trị</a><a data-value="144">Sóc Trăng</a><a data-value="145">Sơn
                  La</a><a data-value="146">Tây Ninh</a><a data-value="147">Thái Bình</a><a data-value="148">Thái
                  Nguyên</a><a data-value="149">Thanh Hóa</a><a data-value="150">Thừa Thiên Huế</a><a
                  data-value="151">Tiền Giang</a><a data-value="152">Trà Vinh</a><a data-value="153">Tuyên Quang</a><a
                  data-value="154">Vĩnh Long</a><a data-value="155">Vĩnh Phúc</a><a data-value="156">Yên Bái</a></aside>
            </div>
          </div>
          <div class="dist"><span>Chọn quận, huyện</span></div>
          <div class="listdist">
            <div class="searchlocal">
              <form>
                <input name="txtDis" id="txtDis" type="text" placeholder="Nhập quận, huyện để tìm nhanh">
                <button type="button" class="submit"><i class="iconmobile-search"></i></button>
              </form>
            </div>
            <div class="scroll">
              <aside><a data-value="16">Quận 1</a><a data-value="17">Quận 2</a><a data-value="18">Quận 3</a><a
                  data-value="19">Quận 4</a><a data-value="20">Quận 5</a><a data-value="21">Quận 6</a><a
                  data-value="22">Quận 7</a><a data-value="23">Quận 8</a><a data-value="24">Quận 9</a><a
                  data-value="25">Quận 10</a><a data-value="26">Quận 11</a><a data-value="27">Quận 12</a></aside>
              <aside><a data-value="30">Quận Tân Bình</a><a data-value="33">Quận Tân Phú</a><a data-value="52">Quận Phú
                  Nhuận</a><a data-value="29">Quận Gò Vấp</a><a data-value="51">Quận Bình Thạnh</a><a
                  data-value="28">Quận Thủ Đức</a><a data-value="31">Quận Bình Tân</a><a data-value="32">Huyện Hóc
                  Môn</a><a data-value="34">Huyện Củ Chi</a><a data-value="35">Huyện Nhà Bè</a><a data-value="36">Huyện
                  Bình Chánh</a><a data-value="61">Huyện Cần Giờ</a></aside>
            </div>
          </div>
          <div class="clr"></div>
          <div class="choosecolor">
            <span>Chọn màu cần kiểm tra</span>
            <div class="listcolor ">
              <a class="choosed" data-value="0131491002032">
                <div>
                  <img width="30" height="30"
                    data-original="//cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-trang-200x200-180x125.png"
                    class="lazy"
                    src="//cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-trang-200x200-180x125.png"
                    style="display: block;">
                </div>
                Trắng
              </a>
              <a class="" data-value="0131491002030">
                <div>
                  <img width="40" height="40"
                    data-original="//cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-xanh-200x200-180x125.png"
                    class="lazy"
                    src="//cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-xanh-200x200-180x125.png"
                    style="display: block;">
                </div>
                Xanh Dương
              </a>
              <a class="" data-value="0131491002031">
                <div>
                  <img width="40" height="40"
                    data-original="//cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-den-200x200-180x125.png"
                    class="lazy"
                    src="//cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-den-200x200-180x125.png"
                    style="display: block;">
                </div>
                Đen
              </a>
            </div>
          </div>
          <div class="clr"></div>
          <div class="listmarket" style="display: none">
            <strong class="dsstlbl">Danh sách siêu thị</strong>
            <ul class="listst "></ul>
            <div class="clr"></div>
            <form method="get" action="/them-vao-gio-hang" class="frm_store">
              <input id="ProvinceId" name="ProvinceId" type="hidden" value="3">
              <input id="DistricId" name="DistricId" type="hidden" value="0">
              <input id="ProductCode" name="ProductCode" type="hidden" value="0131491002032">
              <input id="StoreId" name="StoreId" type="hidden" value="0">
              <input id="ProductId" name="ProductId" type="hidden" value="216174">
              <input id="StockStatus" name="StockStatus" type="hidden" value="">
              <input id="IsStock" name="IsStock" type="hidden" value="true">
              <button type="submit" class="none btn_store"></button>
            </form>
          </div>
        </div>
        <div class="clr"></div>
      </div>
      <ul class="policy ">
        <li class="inpr">
          <span>Bộ sản phẩm gồm: <a class="stdImg" href="javascript:void(0)" onclick="showGalleryPS(100,0);">Sạc ,Tai
              nghe ,Ốp lưng ,Cáp ,Cây lấy sim ,Sách hướng dẫn ,Hộp <i class="icondetail-camera standkit"
                href="//cdn.tgdd.vn/Products/Images/42/216174/Kit/samsung-galaxy-a31-bbh-org.jpg"></i></a></span>
        </li>
        <li class="wrpr">
          <span>
            Bảo hành chính hãng 12 tháng.
          </span>
        </li>
        <li class="chpr">
          Lỗi là đổi mới trong 1 tháng tại hơn 2024 siêu thị toàn quốc
          <a href="javascript:openPopWrt();">Xem chi tiết</a>
        </li>
      </ul>
      <div class="productOld">
        <a class="viewold" target="_blank" href="/may-doi-tra/dien-thoai/samsung-galaxy-a31?pid=216174&amp;c=42">
          Xem Samsung Galaxy A31 cũ
          <div>
            <span>Giá dưới: <strong>5.260.000₫</strong></span>
            <span>Bảo hành tới 11.5 tháng</span>
          </div>
        </a>
      </div>
      <div class="wrap_wrtp wrap_wrty hide">
        <div class="pop">
          <div class="hdpop">CHÍNH SÁCH BẢO HÀNH, ĐỔI TRẢ <a href="javascript:closePopWrt();"
              class="closehd"><span>✖</span></a></div>
          <div class="ctW">
            <div class="bh">
              <span class="tlt">BẢO HÀNH CHÍNH HÃNG</span>
              <span>
                Thân máy 12 tháng, pin 12 tháng, sạc 6 tháng, tai nghe 6 tháng
                <a class="pWarr" target="_blank" href="/bao-hanh/samsung">Xem điểm bảo hành Samsung</a>
              </span>
            </div>
            <div class="cs">
              <span class="tlt">
                CHÍNH SÁCH ĐỔI TRẢ
                <span class="nt">Chỉ cần số điện thoại mua hàng, không cần giấy tờ</span>
              </span>
              <h2 id="wH-0" class="down">Lỗi do nhà sản xuất</h2>
              <div id="wCt-0" style="display: block;">
                <p><strong>Tháng 1</strong></p>
                <ul>
                  <li><strong>1 đổi 1&nbsp;</strong>tại bất kì siêu thị Thế Giới Di Động, Điện máy XANH toàn quốc
                    ,&nbsp;nếu hết hàng đổi máy khác bù thêm tiền hoặc Thế Giới Di Động / Điện máy XANH trả lại tiền
                    chênh lệch.</li>
                  <li>Hoặc trả máy thì nhận lại tiền 80% giá trị máy.</li>
                </ul>
                <p><strong>Tháng 2 - 12</strong></p>
                <ul>
                  <li>Thế Giới Di Động / Điện máy XANH chuyển hãng bảo hành,&nbsp;<strong>có máy dùng tạm trong thời
                      gian chờ</strong></li>
                  <li>Hoặc trả máy thì nhận lại tiền 75% ở tháng thứ 2, 70% ở tháng thứ 3... (mỗi tháng mất thêm 5%) giá
                    trị máy</li>
                </ul>
              </div>
              <h2 id="wH-1">Sản phẩm không lỗi</h2>
              <div id="wCt-1">
                <p><strong>Tháng 1​</strong></p>
                <ul>
                  <li>Trả máy thì nhận lại tiền 80% giá trị máy</li>
                </ul>
                <p><strong>Tháng 2 - 12</strong></p>
                <ul>
                  <li>Trả máy thì nhận lại tiền 75% ở tháng thứ 2, 70% ở tháng thứ 3... (mỗi tháng mất thêm 5%) giá trị
                    máy</li>
                </ul>
              </div>
              <h2 id="wH-2">Sản phẩm lỗi do người dùng</h2>
              <div id="wCt-2">
                <p><strong>Không bảo hành đổi trả</strong>. Thế Giới Di Động / Điện máy XANH hỗ trợ chuyển hãng bảo
                  hành, khách hàng chịu phí sửa chữa.</p>
              </div>
              <label class="xct">Xem đầy đủ: <a href="https://www.thegioididong.com/chinh-sach-bao-hanh-san-pham">Chính
                  sách bảo hành đổi trả</a></label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="clr"></div>
  <input type="hidden" id="hdgamecombo" value="true">
  <div class="gamecombo">
    <h2 id="ban-kem" class="h2game">Ưu đãi khi mua Phụ Kiện cùng Samsung Galaxy A31</h2>
    <ul class="n4 list"
      data-list="[205819,100426,77610,193183,54318,57859,92879,79368,81999,125847,78540,207655,82652,82689,100424,189361,188089,68120,88234,82012,92883,81359,91588,194825,60677,72800,79366,73073,79364,197860,144572,183512,75072,79365,82656,195726,146461,193208,133938,81183,73892,195727,143401,206665,143308,157093,202536,201517,202541,205823,205827,187375,86504,146881,196723,202888,209307,202697,92416,187841,74185,70820,74879,143403,68924,197859,143410,202538,202699,146880,69513,187374,86501,211183,187802,88034,72775,69514,142235,89064,89080,74300,202525,202694,74183,211181,82701,212122,211180,202700,203677,209236,202534,212128,211182,209142,145724,212876,198272,195151,145718,203165,214690,145719,174748,214689,145557,195148,145553,194974,70380,200326,55321,69533,68268,205963,89057,146838,208854,109582,108556,205884,91737,154698,77932]">
      <li>
        <div>
          <img data-original="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-600x600-1-200x200.jpg"
            class="lazy" width="100" height="100"
            src="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-600x600-1-200x200.jpg"
            style="display: inline;">
          <div class="info first">
            <h3 class="active" data-i="216174" data-p="6490000" data-h="6490000">Samsung Galaxy A31</h3>
            <strong>6.490.000₫</strong>
            <span class="line"></span>
          </div>
        </div>
      </li>
      <li id="catcb57">
        <div class="augment"></div>
        <div>
          <a href="/sac-dtdd/sac-du-phong-polymer-10000mah-c-xmobile-pw37y5b" target="_blank">
            <img
              data-original="https://cdn.tgdd.vn/Products/Images/57/214689/sac-du-phong-polymer-10000mah-c-xmobile-pw37y5b-1-200x200.jpg"
              class="lazy" width="100" height="100"
              src="https://cdn.tgdd.vn/Products/Images/57/214689/sac-du-phong-polymer-10000mah-c-xmobile-pw37y5b-1-200x200.jpg"
              style="display: inline;">
          </a>
          <div class="info">
            <h3 class="active" onclick="CheckItemCombo(this)" data-i="214689" data-c="1" data-p="487000"
              data-h="650000"><i class="iconmobile-uncheck"></i>Pin sạc dự phòng Polymer 10.000mAh Type C Xmobile
              PW37Y5B Trắng</h3>
            <strong>487.000₫</strong>
            <span class="line">650.000₫</span>
            <span>(-25%)</span>
            <a href="javascript:void(0)" onclick="showmorecombo(57, 214689, 216174, 'pin sạc')" class="compdetail">Chọn
              pin sạc khác </a>
          </div>
        </div>
      </li>
      <li id="catcb1363">
        <div class="augment"></div>
        <div>
          <a href="/mieng-dan-man-hinh/mieng-dan-film-trong-dien-thoai-nho" target="_blank">
            <img
              data-original="https://cdn.tgdd.vn/Products/Images/1363/55321/mieng-dan-film-trong-dien-thoai-nho-avatar-1-200x200.jpg"
              class="lazy" width="100" height="100"
              src="https://cdn.tgdd.vn/Products/Images/1363/55321/mieng-dan-film-trong-dien-thoai-nho-avatar-1-200x200.jpg"
              style="display: inline;">
          </a>
          <div class="info">
            <h3 class="active" onclick="CheckItemCombo(this)" data-i="55321" data-c="1" data-p="35000" data-h="50000"><i
                class="iconmobile-uncheck"></i>Miếng dán Film điện thoại</h3>
            <strong>35.000₫</strong>
            <span class="line">50.000₫</span>
            <span>(-30%)</span>
            <a href="javascript:void(0)" onclick="showmorecombo(1363, 55321, 216174, 'miếng dán')"
              class="compdetail">Chọn miếng dán khác </a>
          </div>
        </div>
      </li>
      <li class="tt">
        <div class="bb">
          <label>Tổng tiền:</label>
          <div class="area_price">
            <strong>7.012.000₫</strong>
            <strong class="line">7.190.000₫</strong>
          </div>
        </div>
        <a id="mua-combo" href="/gio-hang?ProductId=216174&amp;game=combo" class="buy_now" onclick="addCart(this)"
          data-value="216174">
          <b>Mua 3 sản phẩm </b>
          <span>Tiết kiệm 178.000₫</span>
        </a>
      </li>
    </ul>
    <div class="wrapcp hide">
      <div class="wrapPop">
        <div class="titlebar">
          <b>Chọn mua phụ kiện khác</b>
          <a href="javascript:closepopupcombo();" class="back"><i
              class="icontgdd-closefilter iconmobile-closefil"></i></a>
        </div>
        <div class="ct">
        </div>
      </div>
    </div>
  </div>
  <style>
    #hdgamecombo[value=true]~.box_content {
      border: none;
    }

    .h2game {
      display: block;
      line-height: 1.3em;
      font-size: 20px;
      color: #333;
      margin: 20px 0 10px 0;
    }

    .gamecombo ul {
      display: block;
      overflow: hidden;
      margin-top: 10px;
      border: 1px solid #ddd;
      -moz-border-radius: 4px;
      -webkit-border-radius: 4px;
      border-radius: 4px;
      padding: 10px;
    }

    .gamecombo ul.n6 li {
      float: left;
      overflow: hidden;
      width: 16%;
    }

    .gamecombo ul.n6 li.tt {
      padding: 20px;
    }

    .gamecombo ul.n5 li {
      float: left;
      overflow: hidden;
      width: 20%;
    }

    .gamecombo ul.n4 li {
      float: left;
      overflow: hidden;
      width: 25%;
    }

    .gamecombo ul.n3 li {
      float: left;
      overflow: hidden;
      width: 23%;
      padding: 0 5%;
    }

    .gamecombo li {
      float: left;
      overflow: hidden;
      width: 25%;
    }

    .gamecombo li a {
      display: block;
      overflow: hidden;
      color: #288ad6;
      text-align: center;
    }

    .gamecombo li a.botbtn {
      display: none;
    }

    .gamecombo li div {
      display: block;
      overflow: hidden;
      color: #288ad6;
      text-align: center;
    }

    .gamecombo li div.info {
      text-align: left;
      padding: 0 5px;
    }

    .gamecombo li div.info a {
      text-align: left;
    }

    .gamecombo li div.first {
      padding-left: 60px;
    }

    .gamecombo .list li .augment {
      background: #fff;
      width: 18px;
      height: 18px;
      position: relative;
      float: left;
      margin-top: 50px;
      display: inline-block !important;
      cursor: pointer;
    }

    .gamecombo .list li .augment:before {
      content: '';
      width: 18px;
      height: 4px;
      background: #BFBFBF;
      display: block;
      margin: 7px auto;
    }

    .gamecombo .list li .augment:after {
      content: '';
      width: 4px;
      height: 18px;
      background: #BFBFBF;
      display: block;
      margin: 0px auto;
      position: absolute;
      top: 0px;
      left: 0;
      right: 0;
    }

    .gamecombo li div img {
      width: auto;
      height: 100px;
    }

    .gamecombo li h3 {
      color: #333;
      display: -webkit-box;
      -webkit-line-clamp: 2;
      -webkit-box-orient: vertical;
      overflow: hidden;
      padding-top: 10px;
      font-weight: bold;
      cursor: pointer;
    }

    .gamecombo li strong {
      display: inline-block;
      color: #d0021b;
      padding: 10px 0 10px 0;
    }

    .gamecombo li span {
      color: #666;
      font-size: 12px;
      padding: 10px 0 10px 0;
    }

    .gamecombo li span.line {
      text-decoration: line-through;
    }

    .gamecombo .bb {
      margin-top: 30px;
      text-align: left;
    }

    .gamecombo .bb label {
      font-size: 16px;
    }

    .gamecombo .buy_now {
      display: block;
      overflow: hidden;
      padding: 7px 0;
      -moz-border-radius: 4px;
      -webkit-border-radius: 4px;
      border-radius: 4px;
      font-size: 16px;
      line-height: normal;
      text-transform: uppercase;
      color: #fff;
      text-align: center;
      background: #fd6e1d;
      background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#fd6e1d), to(#f59000));
      background: -webkit-linear-gradient(top, #f59000, #fd6e1d);
      background: -moz-linear-gradient(top, #f59000, #fd6e1d);
      background: -ms-linear-gradient(top, #f59000, #fd6e1d);
      background: -o-linear-gradient(top, #f59000, #fd6e1d);
    }

    .gamecombo .buy_now span {
      display: block;
      font-size: 13px;
      color: #fff;
      text-transform: none;
      padding: 3px 0;
    }

    .gamecombo li .area_price {
      padding: 0;
      text-align: left;
    }

    .gamecombo li .area_price strong {
      display: inline-block;
      font-size: 20px;
      padding: 0;
      margin: 10px 0;
    }

    .gamecombo li .area_price strong.line {
      display: inline-block;
      vertical-align: middle;
      font-size: 16px;
      color: #999;
      text-decoration: line-through;
      margin: 0;
    }

    #popup {
      width: 900px;
      position: relative;
      background-color: #fff;
    }

    #popup b {
      padding: 10px;
      display: block;
    }

    a.cls.back {
      position: absolute;
      right: 10px;
      top: 10px;
      cursor: pointer;
      z-index: 999;
    }

    #popup .content {
      position: relative;
      overflow: hidden;
      padding: 0px 15px;
      max-height: 700px;
    }

    .gamecombo .wrapcp {
      overflow: hidden;
      position: fixed;
      left: 0;
      right: 0;
      bottom: 0;
      height: 100vh;
      background: rgba(0, 0, 0, .5);
      z-index: 9;
    }

    .gamecombo .wrapcp .wrapPop .titlebar b {
      font-size: 20px;
      padding: 10px 20px;
      display: block;
      text-align: left;
      background-color: #fff;
      color: #000;
      margin: 0px;
    }

    .gamecombo .wrapcp .wrapPop .titlebar .back {
      position: absolute;
      right: 10px;
      top: 10px;
    }

    .gamecombo .wrapcp .wrapPop .titlebar .back:before {
      display: none;
    }

    .gamecombo .wrapcp .wrapPop {
      display: block;
      overflow: auto;
      position: relative;
      width: 100%;
      max-width: 900px;
      height: auto;
      max-height: 600px;
      margin: auto;
      background: #fff;
      -moz-border-radius: 5px;
      -webkit-border-radius: 5px;
      border-radius: 5px;
    }

    .gamecombo .wrapcp .wrapPop .ct {
      padding: 0 20px;
    }

    .icontgdd-closefilter {
      background-position: -205px -30px;
      width: 18px;
      height: 18px;
    }

    .scroll {
      overflow: hidden;
      overflow-y: scroll !important;
      -webkit-overflow-scrolling: touch;
      -ms-scroll-chaining: chained;
    }
  </style>
  <script>
    function CheckItemCombo(t) {
          if ($(t).hasClass('active'))
              $(t).removeClass('active');
          else
              $(t).addClass('active');
          UpdateTotalPriceCombo();
      }
      
      function UpdateTotalPriceCombo() {
          var totalItem = 0;
          var totalmoney = 0;
          var totalhismoney = 0;
          $('.gamecombo .list li h3.active').each(function () {
              totalmoney += parseInt($(this).attr('data-p'), 10);
              totalhismoney += parseInt($(this).attr('data-h'), 10);
              totalItem += 1;
          })
          $('.tt .bb .area_price strong').html(formatNumberValue(totalmoney) + 'đ');
          $('.tt .bb .area_price strong.line').html(formatNumberValue(totalhismoney) + 'đ');
          $('.tt .buy_now span').html('Tiết kiệm ' + formatNumberValue(totalhismoney - totalmoney) + 'đ');
          $('.tt .buy_now b').html('Mua ' + totalItem + ' sản phẩm');
      }
      
      function formatNumberValue(number) {
          var intLength = number.toString().length;
          var intLeft = 0;
          var strNumber = '';
          var strNewNumber = '';
          while (intLength % 3 != 0) {
              intLength++;
              intLeft++;
          }
          if (intLeft != 0) {
              for (var intCount = 0; intCount < intLeft; intCount++) {
                  strNumber += '0';
              }
          }
          strNumber += number.toString();
          for (var intCount = 0; intCount < intLength; intCount++) {
              strNewNumber += strNumber.charAt(intCount);
      
              if (intCount > 0 && (intCount + 1) % 3 == 0 && intCount != intLength - 1) {
                  strNewNumber += '.';
              }
          }
          strNewNumber = strNewNumber.substring(intLeft);
          return strNewNumber;
      }
      
      var fl_showmorecombo = false;
      
      function showmorecombo(cateId, currId, proId, catname) {
          if (fl_showmorecombo) return false;
          fl_showmorecombo = !fl_showmorecombo;
          if (typeof $.colorbox == "undefined") {
              $.getScript("/Scripts/common/jquery.colorbox-min.js")
                  .done(function (script, textStatus) {
                      fl_showmorecombo = !fl_showmorecombo;
                      showmorecombo(cateId, currId, proId, catname);
                  });
              return false;
          }
      
          POSTAjax("/aj/orderv4/GetMoreCombo", { productId: proId, currId: currId, cateId: cateId }, BeforeSendAjax,
              function (result) {
                  fl_showmorecombo = !fl_showmorecombo;
                  AddColorBox('#popup', '#lpopup', result);
                  $('#popup .h').html('Chọn mua ' + catname + ' khác');
                  EndSendAjax();
              }, ErrorAjax, true);
      
      }
      
      function AddColorBox(idResult, objectId, ajaxResult) {
          if (typeof (ajaxResult) == 'object') {
              if (ajaxResult.status == -1) {
                  alert(ajaxResult.error);
              }
          } else {
              if (ajaxResult == null || ajaxResult == '') return;
              if ($(idResult).length == 0) {
                  $('body').addClass('hidden').append(ajaxResult);
                  //$('section, footer').addClass('fixbody');
                  $(objectId).colorbox({
                      inline: true, closeButton: false, maxHeight: '98%', fixed: true,
                      onClosed: function () {
                          $(idResult).remove();
                          $('body').removeClass('hidden');
                          $('section, footer').removeClass('fixbody');
                      }
                  });
                  $(objectId).trigger('click').remove();
              } else {
                  $(idResult).replaceWith(ajaxResult);
                  $.colorbox.resize({ width: $(idResult).width() + 'px' });
                  $(objectId).remove();
              }
              //$(window).on('resize', function () {
              //    $.colorbox.resize({ width: $(idResult).width() + 'px' });
              //});
          }
      }
      
      function ChangeCombo(id, catid) {
          $('#catcb' + catid).html($('#pop' + id).html());
          UpdateTotalPriceCombo();
          $.colorbox.close();
      }
      
      function addCart(t) {
          var url = $(t).attr('href');
          var combo = "&combo=";
          $('.gamecombo .list li h3.active').each(function () {
              combo += $(this).attr('data-i') + ',';
          })
          url += combo;
          $(t).attr('href', url);
          return false;
      }
      
  </script>
  <div class="clr"></div>
  <div class="box_content">
    <aside class="left_content">
      <div class="characteristics">
        <h2>Đặc điểm nổi bật của Samsung Galaxy A31</h2>
        <div id="owl-detail" class="owl-carousel owl-detail owl-theme" style="opacity: 1; display: block;">
          <div class="owl-wrapper-outer autoHeight" style="height: 433px;">
            <div class="owl-wrapper" style="width: 17160px; left: 0px; display: block;">
              <div class="owl-item" style="width: 780px;">
                <div class="item">
                  <img class="lazyOwl"
                    src="https://cdn.tgdd.vn/Products/Images/42/216174/Slider/vi-vn-samsung-galaxy-a31-tinhnang.jpg"
                    style="display: block;">
                </div>
              </div>
              <div class="owl-item loading" style="width: 780px;">
                <div class="item">
                  <img class="lazyOwl"
                    data-src="https://cdn.tgdd.vn/Products/Images/42/216174/Slider/vi-vn-samsung-galaxy-a31-thietke.jpg"
                    style="display: none;">
                </div>
              </div>
              <div class="owl-item loading" style="width: 780px;">
                <div class="item">
                  <img class="lazyOwl"
                    data-src="https://cdn.tgdd.vn/Products/Images/42/216174/Slider/vi-vn-samsung-galaxy-a31-manhinh.jpg"
                    style="display: none;">
                </div>
              </div>
              <div class="owl-item loading" style="width: 780px;">
                <div class="item">
                  <img class="lazyOwl"
                    data-src="https://cdn.tgdd.vn/Products/Images/42/216174/Slider/vi-vn-samsung-galaxy-a31-camerasau.jpg"
                    style="display: none;">
                </div>
              </div>
              <div class="owl-item loading" style="width: 780px;">
                <div class="item">
                  <img class="lazyOwl"
                    data-src="https://cdn.tgdd.vn/Products/Images/42/216174/Slider/vi-vn-samsung-galaxy-a31-sieurong.jpg"
                    style="display: none;">
                </div>
              </div>
              <div class="owl-item loading" style="width: 780px;">
                <div class="item">
                  <img class="lazyOwl"
                    data-src="https://cdn.tgdd.vn/Products/Images/42/216174/Slider/vi-vn-samsung-galaxy-a31-selfie.jpg"
                    style="display: none;">
                </div>
              </div>
              <div class="owl-item loading" style="width: 780px;">
                <div class="item">
                  <img class="lazyOwl"
                    data-src="https://cdn.tgdd.vn/Products/Images/42/216174/Slider/vi-vn-samsung-galaxy-a31-cauhinh.jpg"
                    style="display: none;">
                </div>
              </div>
              <div class="owl-item loading" style="width: 780px;">
                <div class="item">
                  <img class="lazyOwl"
                    data-src="https://cdn.tgdd.vn/Products/Images/42/216174/Slider/vi-vn-samsung-galaxy-a31-gamebooster.jpg"
                    style="display: none;">
                </div>
              </div>
              <div class="owl-item loading" style="width: 780px;">
                <div class="item">
                  <img class="lazyOwl"
                    data-src="https://cdn.tgdd.vn/Products/Images/42/216174/Slider/vi-vn-samsung-galaxy-a31-pin.jpg"
                    style="display: none;">
                </div>
              </div>
              <div class="owl-item loading" style="width: 780px;">
                <div class="item">
                  <img class="lazyOwl"
                    data-src="https://cdn.tgdd.vn/Products/Images/42/216174/Slider/vi-vn-samsung-galaxy-a31-vantay.jpg"
                    style="display: none;">
                </div>
              </div>
              <div class="owl-item loading" style="width: 780px;">
                <div class="item">
                  <img alt="Bộ sản phẩm chuẩn"
                    data-src="//cdn.tgdd.vn/Products/Images/42/216174/Kit/samsung-galaxy-a31-bbh-org.jpg"
                    class="lazyOwl" style="display: none;">
                  <div class="des">
                    <p>Bộ sản phẩm chuẩn: Sạc ,Tai nghe ,Ốp lưng ,Cáp ,Cây lấy sim ,Sách hướng dẫn ,Hộp</p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="owl-controls clickable">
            <div class="owl-pagination">
              <div class="owl-page active"><span class=""></span></div>
              <div class="owl-page"><span class=""></span></div>
              <div class="owl-page"><span class=""></span></div>
              <div class="owl-page"><span class=""></span></div>
              <div class="owl-page"><span class=""></span></div>
              <div class="owl-page"><span class=""></span></div>
              <div class="owl-page"><span class=""></span></div>
              <div class="owl-page"><span class=""></span></div>
              <div class="owl-page"><span class=""></span></div>
              <div class="owl-page"><span class=""></span></div>
              <div class="owl-page"><span class=""></span></div>
            </div>
            <div class="owl-buttons">
              <div class="owl-prev"></div>
              <div class="owl-next"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="boxArticle">
        <article class="area_article" style="height: 478px;">
          <h2><a href="https://www.thegioididong.com/dtdd/samsung-galaxy-a31" target="_blank"
              title="Xem thông tin chi tiết điện thoại Samsung Galaxy A31"
              type="Xem thông tin chi tiết điện thoại Samsung Galaxy A31">Galaxy A31</a> là mẫu <a
              href="https://www.thegioididong.com/dtdd" target="_blank"
              title="Tham khảo giá điện thoại smartphone chính hãng, giá rẻ"
              type="Tham khảo giá điện thoại smartphone chính hãng, giá rẻ">smartphone</a> tầm trung mới ra mắt đầu năm
            2020 của Samsung. Thiết bị gây ấn tượng mạnh với ngoại hình thời trang, cụm 4 camera đa chức năng, vân tay
            dưới màn hình và viên pin khủng lên đến 5000 mAh.</h2>
          <h3>Thiết kế đặc trưng của dòng Galaxy A 2020</h3>
          <p>Tổng thể thiết kế của Galaxy A31 mang nhiều nét tương đồng với hai người anh em <a
              href="https://www.thegioididong.com/dtdd/samsung-galaxy-a51" target="_blank"
              title="Xem thông tin chi tiết điện thoại Samsung Galaxy A51"
              type="Xem thông tin chi tiết điện thoại Samsung Galaxy A51">Galaxy A31</a> và <a
              href="https://www.thegioididong.com/dtdd/samsung-galaxy-a71" target="_blank"
              title="Xem thông tin chi tiết điện thoại Samsung Galaxy A71"
              type="Xem thông tin chi tiết điện thoại Samsung Galaxy A71">A71</a>. Mặt lưng của thiết bị vẫn được tạo
            điểm nhấn với cụm camera lớn và các vân kim cương đẹp mắt.</p>
          <p><a class="preventdefault" href="https://www.thegioididong.com/images/42/216174/samsung-galaxy-a313-2.jpg"
              onclick="return false;"><img alt="Mặt lưng sáng bóng trên điện thoại Samsung Galaxy A31"
                data-original="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a313-2.jpg" class="lazy"
                title="Mặt lưng sáng bóng trên điện thoại Samsung Galaxy A31"
                src="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a313-2.jpg"
                style="display: block;"></a></p>
          <p>Ở mặt trước, Samsung trang bị cho A31 màn hình tràn viền Infinity-U với kích thước 6.4 inch, sử dụng tấm
            nền Super AMOLED với độ phân giải Full HD+ cho hình ảnh sắc nét và tươi sáng.</p>
          <p><a class="preventdefault" href="https://www.thegioididong.com/images/42/216174/samsung-galaxy-a312-3.jpg"
              onclick="return false;"><img alt="Tổng thể điện thoại Samsung Galaxy A31"
                data-original="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a312-3.jpg" class="lazy"
                title="Tổng thể điện thoại Samsung Galaxy A31"
                src="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a312-3.jpg"
                style="display: block;"></a></p>
          <p>Viền màn hình được làm mỏng ở các cạnh bên và cạnh trên, tuy nhiên phần “cằm” máy vẫn khá dày chứ không
            được làm thanh thoát như trên các mẫu máy cao cấp hơn.</p>
          <p><a class="preventdefault" href="https://www.thegioididong.com/images/42/216174/samsung-galaxy-a311-3.jpg"
              onclick="return false;"><img alt="Vị trí đặt cảm biến vân tay trên điện thoại Samsung Galaxy A31"
                data-original="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a311-3.jpg" class="lazy"
                title="Vị trí đặt cảm biến vân tay trên điện thoại Samsung Galaxy A31"
                src="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a311-3.jpg"
                style="display: block;"></a></p>
          <p>Đặc biệt hơn màn hình của A31 được tích hợp luôn cảm biến vân tay quang học thay vì đặt ở mặt lưng như trên
            M31. Đồng nghĩa với việc vị trí đặt tay mở khóa sẽ tự nhiên hơn và cảm giác sử dụng cũng hiện đại, cao cấp
            hơn.</p>
          <h3>Cụm 4 camera thoải mái sáng tạo</h3>
          <p>Samsung năm nay tập trung khá nhiều vào camera trên smartphone. Cụm 4 camera của A31 bao gồm cảm biến chính
            lên đến 48 MP, camera góc rộng 8 MP, camera <a
              href="https://www.thegioididong.com/tin-tuc/tim-hieu-xoa-phong-huong-dan-xoa-phong-tren-moi-smartphone-892585"
              target="_blank" title="Tìm hiểu về chụp ảnh xóa phông" type="Tìm hiểu về chụp ảnh xóa phông">chụp ảnh xóa
              phông</a> và chụp cận cảnh cùng độ phân giải 5 MP.</p>
          <p><a class="preventdefault" href="https://www.thegioididong.com/images/42/216174/samsung-galaxy-a314-2.jpg"
              onclick="return false;"><img alt="Cụm camera sau trên điện thoại Samsung Galaxy A31"
                data-original="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a314-2.jpg" class="lazy"
                title="Cụm camera sau trên điện thoại Samsung Galaxy A31"
                src="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a314-2.jpg"
                style="display: block;"></a></p>
          <p>Với đầy đủ các ống kính thông dụng trên smartphone hiện tại, Samsung Galaxy A31 đủ khả năng ghi lại những
            khoảnh khắc thường ngày đầy đủ và sáng tạo.&nbsp;</p>
          <p><a class="preventdefault" href="https://www.thegioididong.com/images/42/216174/samsung-galaxy-a319-2.jpg"
              onclick="return false;"><img alt="Giao diện camra trên điện thoại Samsung Galaxy A31"
                data-original="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a319-2.jpg" class="lazy"
                title="Giao diện camra trên điện thoại Samsung Galaxy A31"
                src="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a319-2.jpg"
                style="display: block;"></a></p>
          <p>Các tính năng chụp ảnh tối ưu bằng AI, chụp chân dung xóa phông chuyên nghiệp, Live Focus, Panorama,... đều
            có mặt đầy đủ trên mẫu <a href="https://www.thegioididong.com/dtdd-samsung" target="_blank"
              title="Tham khảo giá điện thoại smartphone Samsung chính hãng">smartphone Samsung</a>.</p>
          <p><a class="preventdefault" href="https://www.thegioididong.com/images/42/216174/samsung-galaxy-a317.jpg"
              onclick="return false;"><img alt="Camera selfie trên điện thoại Samsung Galaxy A31"
                data-original="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a317.jpg" class="lazy"
                title="Camera selfie trên điện thoại Samsung Galaxy A31"
                src="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a317.jpg" style="display: block;"></a>
          </p>
          <p>Phía trước của máy là camera selfie độ phân giải khá lớn 20 MP, cho ra các bức ảnh selfie sắc nét cùng chế
            độ làm đẹp tự nhiên từ Samsung.</p>
          <h3>Pin dung lượng khủng thả ga sử dụng</h3>
          <p>Samsung Galaxy A31 sở hữu viên pin tương đối khủng, dung lượng 5000 mAh. Như vậy việc sử dụng chiếc máy lâu
            hơn 1 ngày hay quay phim, chụp ảnh liên tục lên đến 4-5 tiếng không phải là quá khó khăn với chiếc máy này.
            Máy còn được trang bị công nghệ&nbsp;<a href="https://www.thegioididong.com/dtdd?f=sac-pin-nhanh"
              target="_blank" title="Tham khảo giá điện thoại smartphone sạc pin nhanh">sạc nhanh</a>&nbsp;15 W, rút
            ngắn tối đa thời gian sạc.</p>
          <p><a class="preventdefault" href="https://www.thegioididong.com/images/42/216174/samsung-galaxy-a316-2.jpg"
              onclick="return false;"><img alt="Dung lượng pin lớn trên điện thoại Samsung Galaxy A31"
                data-original="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a316-2.jpg" class="lazy"
                title="Dung lượng pin lớn trên điện thoại Samsung Galaxy A31"
                src="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a316-2.jpg"
                style="display: block;"></a></p>
          <p>Cấu hình còn lại của thiết bị bao gồm chip xử lý MediaTek MT6768 8 nhân, RAM 6 GB và bộ nhớ trong lên đến
            128 GB. Nhìn chung cấu hình máy đáp ứng rất tốt với nhu cầu dùng mạng xã hội, xem phim, chơi các&nbsp;game
            nhẹ nhàng như&nbsp;Hay Day hoặc Candy Crush,...</p>
          <p><a class="preventdefault" href="https://www.thegioididong.com/images/42/216174/samsung-galaxy-a318-2.jpg"
              onclick="return false;"><img alt="Trải nghiệm sử dụng điện thoại Samsung Galaxy A31"
                data-original="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a318-2.jpg" class="lazy"
                title="Trải nghiệm sử dụng điện thoại Samsung Galaxy A31"
                src="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a318-2.jpg"
                style="display: block;"></a></p>
          <p>Nhìn chung Galaxy A31 ra mắt hướng đến người dùng yêu thích một thiết bị thời trang, đủ sức đáp ứng tốt các
            nhu cầu chụp ảnh, sử dụng hàng ngày. Viên pin dùng lâu cũng là điểm cộng lớn nếu như bạn không muốn phải sạc
            máy quá thường xuyên.</p>
          <div class="boxRtAtc">
            <div class="likewied">
              <div class="likeshare">
                <div class="fb-like" data-href="/dtdd/samsung-galaxy-a31" data-layout="button_count" data-action="like"
                  data-size="small" data-show-faces="false" data-share="true"></div>
              </div>
              <div class="clr"></div>
              <div class="order-review">
                <form name="fOrderReview">
                  <div class="left">
                    <p class="first-left">Bài viết này có hữu ích cho Bạn không ?</p>
                    <p class="before-apprise">
                      <b>
                        Cảm ơn bạn đã đánh giá bài viết này
                        <g class="nt"></g>
                        !
                      </b>
                      <br>
                      <span>Để bài viết đạt chất lượng tốt hơn cho những lần sau! </span><br>
                      <span>Mời Bạn chia sẻ thêm thông tin về mình.</span>
                    </p>
                  </div>
                  <div class="right">
                    <a href="javascript:void(0);" onclick="chooseReview(this)" data-val="good" data-name="Hữu ích"
                      class="good none-i"><i class="icondmx-good"></i>Hữu ích</a>
                    <a href="javascript:void(0);" onclick="chooseReview(this)" data-val="bad"
                      data-name="Không hữu ích" class="bad none-i"><i class="icondmx-bad"></i>Không Hữu ích</a>
                    <a class="replay-icon"></a>
                  </div>
                  <div class="clr"></div>
                  <div class="reason bd">
                    <textarea id="Tnote" name="rs_note"
                      placeholder="Bạn có góp ý gì thêm không? (Không bắt buộc)"></textarea>
                    <p></p>
                    <div class="dropdown">
                      <span class="criteria">Chọn độ tuổi</span>
                      <div class="age">
                        <a href="javascript:;">18-24</a>
                        <a href="javascript:;">25-34</a>
                        <a href="javascript:;">35-44</a>
                        <a href="javascript:;">45-54</a>
                        <a href="javascript:;">55-64</a>
                        <a href="javascript:;">65+</a>
                      </div>
                    </div>
                    <div class="dropdown">
                      <span class="criteria">Chọn giới tính</span>
                      <div>
                        <a href="javascript:;" data-gender="1">Nam</a>
                        <a href="javascript:;" data-gender="0">Nữ</a>
                      </div>
                    </div>
                    <a href="javascript:void(0);" class="submit" onclick="submitReview()">Gửi góp ý</a>
                    <div class="clr"></div>
                  </div>
                  <input type="hidden" id="fname" value="Bạn">
                  <input type="hidden" id="fGender" value="">
                  <input type="hidden" name="rs_phone" value="">
                  <input type="hidden" name="rs_gender" value="3">
                  <input type="hidden" name="rs_name" value="Bạn">
                  <input type="hidden" name="rs_type" value="3">
                  <input type="hidden" name="rs_productId" value="216174">
                  <input type="hidden" name="rs_satisfationType" value="0">
                  <input type="hidden" name="rs_age" value="">
                  <p class="er-content"></p>
                </form>
                <div class="thank">
                  <div class="left-thank">
                    <b>Cảm ơn về thông tin bạn đã chia sẻ.</b><br>
                    <span>Với mục tiêu nâng cao chất lượng bài viết.</span><br>
                    <span>thegioididong sẽ luôn lắng nghe mọi ý kiến của bạn</span>
                  </div>
                  <div class="right-thank">
                    <a class="replay-icon-thank"></a>
                  </div>
                </div>
              </div>
              <script>
                //#region Đánh giá trang search
                              
                              function closeForm() {
                                  $(".reason").css("display", "none");
                              }
                              
                              CallCheckAppriseBeforeLoadJquery();
                              
                              var gl_submitReview = false;
                              function submitReview() {
                                  if (gl_submitReview) return false;
                                  gl_submitReview = true;
                                  var form = $('.order-review form');
                                  var vCt = $.trim($('.reason [name=rs_note]').val());
                                  var vGender = $.trim($('input[name=rs_gender]').val());
                                  var vName = $.trim($('input[name=rs_name]').val());
                                  var vPhone = $.trim($('input[name=rs_phone]').val());
                                  var vAge = $.trim($('input[name=rs_age]').val());
                                  var vLink = encodeURI(window.location.href);
                                  var vsatisfationType = $.trim($('input[name=rs_satisfationType]').val());
                                  //if (vEmail == '') { alert('Vui lòng chọn độ tuổi.'); gl_submitReview = false; return false; }
                                  //if (vGender == '') { alert('Vui lòng chọn giới tính.'); gl_submitReview = false; return false; }
                              
                                  var data = {
                                      ct: vCt,
                                      name: vName,
                                      phone: vPhone,
                                      email: "",
                                      gender: vGender,
                                      age: vAge,
                                      type: 3,
                                      productID: productID,
                                      lnk: vLink,
                                      satisfationType: vsatisfationType
                                  };
                                  $.ajax({
                                      type: "POST",
                                      cache: false,
                                      data: data,
                                      url: "/aj/ProductV4/UpdateRatingArticle/",
                                      beforeSend: function () {
                                          BeforeSendAjax();
                                      },
                                      success: function (e) {
                                          gl_submitReview = false;
                                          if (e.mes != null && e.mes != "") {
                                              $('.order-review .er-content').html(e.mes);
                                              $('.order-review .er-content').show();
                                          }
                                          else {
                                              $('.order-review form').remove();
                                              $('.order-review .er-content').html("");
                                              $('.order-review .er-content').hide();
                              
                                              $('.order-review .thank').show();
                                              setlocalStorage(productID, e.res);
                                          }
                                          EndSendAjax();
                                      },
                                      error: function (err) {
                                          gl_submitReview = false;
                                          $('#Tnote').val('');
                                          alert("Vui lòng nhập đúng dữ liệu đánh giá");
                                      }
                                  });
                              }
                              
                              function chooseReview(t) {
                                  $('.order-review .right a').removeClass('act');
                                  $(t).addClass('act');
                                  $('.order-review .right .replay-icon').addClass($('.order-review .right a.act').attr('data-val'));
                                  $('.order-review .right a.replay-icon').html($('.order-review .right a.act').html());
                                  $('.replay-icon-thank').html($('.order-review .right a.act').html());
                                  $('.order-review .right a.none-i').hide();
                                  $('.order-review .left p.first-left').hide();
                                  $('.before-apprise b g.nt').html($('.order-review .right a.act').attr('data-name'));
                                  $('.order-review .left p.before-apprise').show();
                                  if ($(t).data('val') == 'good') {
                                      $('input[name=rs_satisfationType]').val(6);
                                      $('.reason textarea').attr('placeholder', $('#fGender').val().trim() + ' ' + $('#fname').val().trim() + ' có góp ý gì thêm không?');
                                      //$('.reason').removeClass('bd');
                              
                                      // -------- rule moi : submit truoc r moi show, show ra neu update tiep thi submit tip
                                      var form = $('.order-review form');
                                      var vCt = $.trim($('.reason [name=rs_note]').val());
                                      var vGender = $.trim($('input[name=rs_gender]').val());
                                      var vName = $.trim($('input[name=rs_name]').val());
                                      var vPhone = $.trim($('input[name=rs_phone]').val());
                                      var vAge = $.trim($('input[name=rs_age]').val());
                                      var vLink = encodeURI(window.location.href);
                                      var vsatisfationType = $.trim($('input[name=rs_satisfationType]').val());
                                      //if (vEmail == '') { alert('Vui lòng chọn độ tuổi.'); gl_submitReview = false; return false; }
                                      //if (vGender == '') { alert('Vui lòng chọn giới tính.'); gl_submitReview = false; return false; }
                                      var data = {
                                          ct: vCt,
                                          name: vName,
                                          phone: vPhone,
                                          email: "",
                                          age: vAge,
                                          gender: vGender,
                                          type: 3,
                                          productID: productID,
                                          lnk: vLink,
                                          satisfationType: vsatisfationType
                                      };
                                      console.log("before__submit");
                                      $.ajax({
                                          type: "POST",
                                          cache: false,
                                          data: data,
                                          url: "/aj/ProductV4/SubmitRatingArticle/",
                                          beforeSend: function () {
                                              BeforeSendAjax();
                                          },
                                          success: function (e) {
                                              gl_submitReview = false;
                                              //if (e.mes != null && e.mes != "") {
                                              //    $('.order-review .er-content').html(e.mes);
                                              //    $('.order-review .er-content').show();
                                              //}
                                              //else {
                                              //    $('.order-review form').remove();
                                              //    $('.order-review .er-content').html("");
                                              //    $('.order-review .er-content').hide();
                              
                                              //    $('.order-review .thank').show();
                                              //    setlocalStorage(productID, e.res);
                                              //}
                                              console.log("response__submit");
                                              EndSendAjax();
                                          },
                                          error: function (err) {
                                              gl_submitReview = false;
                                              $('#Tnote').val('');
                                              alert("Vui lòng nhập đúng dữ liệu đánh giá");
                                          }
                                      });
                                      // -------- end rule moi submit
                              
                                      $('.reason').show();
                                  }
                                  else {
                                      $('input[name=rs_satisfationType]').val(0);
                                      $('.reason textarea').attr('placeholder', 'Điều gì khiến ' + $('#fGender').val().trim() + ' ' + $('#fname').val().trim() + ' không hài lòng? ');
                                      //$('.reason').addClass('bd');
                                      $('.reason').show();
                                  }
                              }
                              
                              function setlocalStorage(name, val) {
                                  if (localStorage !== undefined) {
                                      localStorage.setItem(name, val);
                                  }
                              }
                              
                              function getlocalStorage(name) {
                                  if (localStorage !== undefined) {
                                      var data = localStorage.getItem(name);
                                      if (data !== null)
                                          return data;
                                  }
                                  return null;
                              }
                              
                              function CheckApprise() {
                                  var productId = $.trim($('input[name=rs_productId]').val());
                                  var tmp = getlocalStorage(productId);
                                  if (tmp != null) {
                                      $('.order-review').hide();
                                  }
                              }
                              
                              function CallCheckAppriseBeforeLoadJquery() {
                                  setTimeout(function () {
                                      if (typeof jQuery !== 'undefined') {
                                          CheckApprise();
                                          return false;
                                      }
                                  }, 1000);
                              }
                              
                              //#endregion
              </script>
            </div>
            <div class="bifRtCt bRtAtc hide">
              <p>Mời bạn góp ý để chúng tôi phục vụ tốt hơn</p>
              <textarea name="txtContent" rows="3"
                placeholder="Vui lòng nhập nội dung góp ý (tối thiểu 30 ký tự)"></textarea>
              <span>Hãy để lại thông tin để được hỗ trợ khi cần thiết (Không bắt buộc):</span>
              <div class="ifRtGd" data-val="">
                <label onclick="rtAtcChangeGder(1)" class="ifGdM "><i></i>Anh</label>
                <label onclick="rtAtcChangeGder(2)" class="ifGdFm"><i></i>Chị</label>
              </div>
              <input type="text" name="txtFullName" placeholder="Họ tên" value="">
              <input type="text" name="txtPhoneNumber" placeholder="Số điện thoại" value="" style="display:none;">
              <input type="text" name="txtEmail" placeholder="Email" value="" style="display:none;">
              <button type="submit" onclick="sendRatingContent(-1)">Gửi góp ý<span>Cam kết bảo mật thông tin cá
                  nhân</span></button>
              <label class="alert"></label>
              <input type="hidden" name="hdRateType" value="2">
              <input type="hidden" name="hdVideoUrl" value="">
            </div>
          </div>
        </article>
        <p class="show-more" style="display:block;position:sticky;" onclick="showArticle();">
          <a id="xem-them-bai-viet" href="javascript:;" class="readmore">Đọc thêm</a>
        </p>
        <div class="bottom_order ">
          <div class="info_sp">
            <img class="lazy" width="70" height="70"
              data-original="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-600x600-1-400x400.jpg"
              src="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-600x600-1-400x400.jpg"
              style="display: inline-block;">
            <div>
              <h3>Điện thoại Samsung Galaxy A31</h3>
              <strong>6.490.000₫</strong>
              <span></span>
            </div>
          </div>
          <div class="area_order">
            <a id="mua-ngay" href="/them-vao-gio-hang?ProductId=216174" class="buy_now" data-value="216174"><b>Mua
                ngay</b><span>Giao tận nơi hoặc nhận tại siêu thị</span></a>
            <a id="tra-gop" class="buy_repay " href="/tra-gop/dtdd/samsung-galaxy-a31"><b>Mua trả góp 0%</b><span>Thủ
                tục đơn giản</span></a>
            <a class="buy_repay s " href="/tra-gop/dtdd/samsung-galaxy-a31?m=credit"><b>Trả góp qua thẻ</b><span>Visa,
                Master, JCB</span></a>
          </div>
        </div>
      </div>
      <div class="clr"></div>
      <div class="compare">
        <div class="tcpr">
          <h4>So sánh với các sản phẩm tương tự</h4>
          <div class="sggProd">
            <form action="javascript:void(0)">
              <input type="text" placeholder="Nhập tên sản phẩm bạn muốn so sánh" onkeyup="SuggestCompare(this,event)">
              <button type="submit"><i class="icontgdd-search"></i></button>
            </form>
          </div>
        </div>
        <ul>
          <li>
            <a href="/dtdd/samsung-galaxy-a31">
              <img
                data-original="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-600x600-1-400x400.jpg"
                class="lazy"
                src="https://cdn.tgdd.vn/Products/Images/42/216174/samsung-galaxy-a31-600x600-1-400x400.jpg"
                style="display: inline;">
              <span class="bdx">
                Bạn đang xem: </span>
              <h3>Samsung Galaxy A31</h3>
              <strong>6.490.000₫</strong>
              <span class="rtp">
                <i class="iconcom-txtstar"></i>
                <i class="iconcom-txtstar"></i>
                <i class="iconcom-txtstar"></i>
                <i class="iconcom-txtunstar"></i>
                <i class="iconcom-txtunstar"></i>
              </span>
              <div class="desc"><span class="g79" data-cpr="64">Màn hình 6.4"</span><span class="g27"
                  data-cpr="48">Camera sau Chính 48 MP &amp; Phụ 8 MP, 5 MP, 5 MP</span><span class="g84"
                  data-cpr="5000">Pin 5000 mAh</span></div>
            </a>
          </li>
          <li>
            <a href="/dtdd/samsung-galaxy-a50">
              <img data-original="https://cdn.tgdd.vn/Products/Images/42/196963/samsung-galaxy-a50-blue-400x400.jpg"
                class="lazy" src="https://cdn.tgdd.vn/Products/Images/42/196963/samsung-galaxy-a50-blue-400x400.jpg"
                style="display: inline;">
              <span class="bdx">
              </span>
              <h3>Samsung Galaxy A50 64GB</h3>
              <strong>6.490.000₫</strong>
              <span class="rtp">
                <i class="iconcom-txtstar"></i>
                <i class="iconcom-txtstar"></i>
                <i class="iconcom-txtstar"></i>
                <i class="iconcom-txtunstar"></i>
                <i class="iconcom-txtunstar"></i>
              </span>
              <div class="desc"><span class="g79" data-cpr="64">Màn hình 6.4"</span><span class="g27"
                  data-cpr="38">Camera sau Chính 25 MP &amp; Phụ 8 MP, 5 MP</span><span class="g84" data-cpr="4000">Pin
                  4000 mAh</span></div>
            </a>
            <a href="/dtdd/samsung-galaxy-a31-vs-samsung-galaxy-a50" class="compdetail">So sánh chi tiết</a>
          </li>
          <li>
            <a href="/dtdd/vivo-v15">
              <img data-original="https://cdn.tgdd.vn/Products/Images/42/199041/vivo-v15-quanghai-400x400.jpg"
                class="lazy" src="https://cdn.tgdd.vn/Products/Images/42/199041/vivo-v15-quanghai-400x400.jpg"
                style="display: inline;">
              <span class="bdx">
              </span>
              <h3>Vivo V15 128GB</h3>
              <strong>5.490.000₫</strong>
              <span class="rtp">
                <i class="iconcom-txtstar"></i>
                <i class="iconcom-txtstar"></i>
                <i class="iconcom-txtstar"></i>
                <i class="iconcom-txtunstar"></i>
                <i class="iconcom-txtunstar"></i>
              </span>
              <div class="desc"><span class="g79" data-cpr="65">Màn hình 6.53"</span><span class="g27"
                  data-cpr="25">Camera sau Chính 12 MP &amp; Phụ 8 MP, 5 MP</span><span class="g84" data-cpr="4000">Pin
                  4000 mAh</span></div>
            </a>
            <a href="/dtdd/samsung-galaxy-a31-vs-vivo-v15" class="compdetail">So sánh chi tiết</a>
          </li>
          <li>
            <a href="/dtdd/samsung-galaxy-a30s">
              <img data-original="https://cdn.tgdd.vn/Products/Images/42/204403/samsung-galaxy-a30s-green-400x400.jpg"
                class="lazy" src="https://cdn.tgdd.vn/Products/Images/42/204403/samsung-galaxy-a30s-green-400x400.jpg"
                style="display: inline;">
              <span class="bdx">
              </span>
              <h3>Samsung Galaxy A30s</h3>
              <strong>5.490.000₫</strong>
              <span class="rtp">
                <i class="iconcom-txtstar"></i>
                <i class="iconcom-txtstar"></i>
                <i class="iconcom-txtunstar"></i>
                <i class="iconcom-txtunstar"></i>
                <i class="iconcom-txtunstar"></i>
              </span>
              <div class="desc"><span class="g79" data-cpr="64">Màn hình 6.4"</span><span class="g27"
                  data-cpr="38">Camera sau Chính 25 MP &amp; Phụ 8 MP, 5 MP</span><span class="g84" data-cpr="4000">Pin
                  4000 mAh</span></div>
            </a>
            <a href="/dtdd/samsung-galaxy-a31-vs-samsung-galaxy-a30s" class="compdetail">So sánh chi tiết</a>
          </li>
        </ul>
      </div>
      <div class="clr"></div>
      <div class="comdetail">
        <div class="boxRatingCmt" id="boxRatingCmt">
          <div class="hrt" id="danhgia">
            <div class="tltRt ">
              <h3 data-s="68" data-gpa="3.6" data-c="19">24 đánh giá Samsung Galaxy A31</h3>
            </div>
          </div>
          <div class="toprt">
            <div class="crt">
              <div class="lcrt " data-gpa="3.6">
                <b>3.6 <i class="iconcom-star"></i></b>
              </div>
              <div class="rcrt">
                <div class="r">
                  <span class="t">5 <i></i></span>
                  <div class="bgb">
                    <div class="bgb-in" style="width: 33%"></div>
                  </div>
                  <span class="c" onclick="ratingCmtList(1,5)" data-buy="7"><strong>8</strong> đánh giá</span>
                </div>
                <div class="r">
                  <span class="t">4 <i></i></span>
                  <div class="bgb">
                    <div class="bgb-in" style="width: 17%"></div>
                  </div>
                  <span class="c" onclick="ratingCmtList(1,4)" data-buy="2"><strong>4</strong> đánh giá</span>
                </div>
                <div class="r">
                  <span class="t">3 <i></i></span>
                  <div class="bgb">
                    <div class="bgb-in" style="width: 33%"></div>
                  </div>
                  <span class="c" onclick="ratingCmtList(1,3)" data-buy="6"><strong>8</strong> đánh giá</span>
                </div>
                <div class="r">
                  <span class="t">2 <i></i></span>
                  <div class="bgb">
                    <div class="bgb-in" style="width: 12%"></div>
                  </div>
                  <span class="c" onclick="ratingCmtList(1,2)" data-buy="3"><strong>3</strong> đánh giá</span>
                </div>
                <div class="r">
                  <span class="t">1 <i></i></span>
                  <div class="bgb">
                    <div class="bgb-in" style="width: 4%"></div>
                  </div>
                  <span class="c" onclick="ratingCmtList(1,1)" data-buy="1"><strong>1</strong> đánh giá</span>
                </div>
              </div>
              <div class="bcrt">
                <a href="javascript:showInputRating()">Gửi đánh giá của bạn</a>
              </div>
            </div>
            <div class="clr"></div>
            <form class="input" name="fRatingComment" style="display: none">
              <input type="hidden" name="hdfStar" id="hdfStar" value="0">
              <input type="hidden" name="hdfProductID" id="hdfProductID" value="216174">
              <input type="hidden" name="hdfRatingImg" class="hdfRatingImg">
              <div class="ips">
                <span>Chọn đánh giá của bạn</span>
                <span class="lStar">
                  <i class="iconcom-unstar" id="s1"></i>
                  <i class="iconcom-unstar" id="s2"></i>
                  <i class="iconcom-unstar" id="s3"></i>
                  <i class="iconcom-unstar" id="s4"></i>
                  <i class="iconcom-unstar" id="s5"></i>
                </span>
                <span class="rsStar hide"></span>
              </div>
              <div class="clr"></div>
              <div class="ipt hide">
                <div class="ct">
                  <textarea name="fRContent" placeholder="Nhập đánh giá về sản phẩm (tối thiểu 80 ký tự)"
                    onkeyup="countTxtRating()"></textarea>
                  <div class="extCt">
                    <label onclick="javascript:void(0);" class="lnksimg btnRatingUpload"><i
                        class="iconcom-pict"></i>Đính kèm ảnh</label>
                    <span class="ckt"></span>
                    <input id="hdFileRatingUpload" type="file" class="hide" accept="image/x-png, image/gif, image/jpeg">
                  </div>
                </div>
                <div class="if">
                  <input type="text" name="fRName" placeholder="Họ tên">
                  <input type="text" name="fRPhone" placeholder="Số điện thoại">
                  <input type="text" name="fREmail" placeholder="Email">
                  <a href="javascript:submitRatingComment();">GỬI ĐÁNH GIÁ</a>
                </div>
                <div class="clr"></div>
                <ul class="resImg hide">
                </ul>
                <span class="lbMsgRt"></span>
              </div>
            </form>
          </div>
          <div class="list">
            <ul class="ratingLst">
              <li id="r-41338546" class="par">
                <div class="rh">
                  <span>CUONG</span>
                  <label class="sttB"><i class="iconcom-checkbuy"></i>Đã mua tại Thegioididong.com</label>
                </div>
                <div class="rc">
                  <p>
                    <span>
                      <i class="iconcom-txtstar"></i>
                      <i class="iconcom-txtstar"></i>
                      <i class="iconcom-txtstar"></i>
                      <i class="iconcom-txtunstar"></i>
                      <i class="iconcom-txtunstar"></i>
                    </span>
                    <i>Chơi game với màng hình A31 không nhạy, Luôn bị khựng lại. Mọi thứ khác thì tạm ổn, chụp hình ok.
                      Mạng 4G mạnh.</i>
                  </p>
                </div>
                <div class="rcf">
                  <p>Thegioididong.com xác nhận: <label><i class="iconcom-rtusr"></i><span>Khách hàng <b
                          class="name">CUONG</b></span></label><label><i class="iconcom-rtadr"></i><span>Đã mua tại:
                        <b>Số 31-33 quốc lộ 61, ấp Tân Phú A, TT. Cái Tắc, H. Châu Thành A, T. Hậu
                          Giang</b></span></label></p>
                  <div class="clr"></div>
                  <label><i class="iconcom-rttime"></i><span>Mua <b>6 ngày </b> trước</span></label>
                  <p></p>
                </div>
                <div class="ra">
                  <a href="javascript:showRatingCmtChild('r-41338546');" class="cmtr">Thảo luận</a>
                  <span>• </span>
                  <a href="javascript:likeRating(41338546);" class="cmtl" data-like="0"><i
                      class="iconcom-like"></i>Thích</a><span> • </span>
                  <a href="javascript:;" class="cmtd">18 giờ trước</a>
                </div>
              </li>
              <li class="rr-41338546 reply hide">
                <input placeholder="Nhập thảo luận của bạn">
                <a href="javascript:ratingRelply(41338546);" class="rrSend">GỬI</a>
                <div class="ifrl hide">
                  <span>Khách</span> | <a href="javascript:cmtEditName()">Nhập tên</a>
                </div>
              </li>
              <li id="r-41318696" class="par">
                <div class="rh">
                  <span>Nguyễn văn thọ</span>
                  <label class="sttB"><i class="iconcom-checkbuy"></i>Đã mua tại Thegioididong.com</label>
                </div>
                <div class="rc">
                  <p>
                    <span>
                      <i class="iconcom-txtstar"></i>
                      <i class="iconcom-txtstar"></i>
                      <i class="iconcom-txtunstar"></i>
                      <i class="iconcom-txtunstar"></i>
                      <i class="iconcom-txtunstar"></i>
                    </span>
                    <i>ở bên tay phải màn hình có vết kẻ đen là sao.ở chỗ âm lượng. Mong tư vấn tôi vừa mới mua song
                    </i>
                  </p>
                </div>
                <div class="rcf">
                  <p>Thegioididong.com xác nhận: <label><i class="iconcom-rtusr"></i><span>Khách hàng <b
                          class="name">Nguyễn văn thọ</b></span></label><label><i class="iconcom-rtadr"></i><span>Đã mua
                        tại: <b>115-117 Đường Bình Thuận, Tổ 29, P.Tân Quang, TP.Tuyên Quang, Tuyên
                          Quang</b></span></label></p>
                  <div class="clr"></div>
                  <label><i class="iconcom-rttime"></i><span>Mua <b>1 ngày </b> trước</span></label>
                  <p></p>
                </div>
                <div class="ra">
                  <a href="javascript:showRatingCmtChild('r-41318696');" class="cmtr">Thảo luận</a>
                  <span>• </span>
                  <a href="javascript:likeRating(41318696);" class="cmtl" data-like="0"><i
                      class="iconcom-like"></i>Thích</a><span> • </span>
                  <a href="javascript:;" class="cmtd">1 ngày trước</a>
                </div>
              </li>
              <li class="rr-41318696 reply hide">
                <input placeholder="Nhập thảo luận của bạn">
                <a href="javascript:ratingRelply(41318696);" class="rrSend">GỬI</a>
                <div class="ifrl hide">
                  <span>Khách</span> | <a href="javascript:cmtEditName()">Nhập tên</a>
                </div>
              </li>
              <li id="r-41306816" class="par">
                <div class="rh">
                  <span>Lê tân</span>
                  <label class="sttB"><i class="iconcom-checkbuy"></i>Đã mua tại Thegioididong.com</label>
                </div>
                <div class="rc">
                  <p>
                    <span>
                      <i class="iconcom-txtstar"></i>
                      <i class="iconcom-txtstar"></i>
                      <i class="iconcom-txtstar"></i>
                      <i class="iconcom-txtstar"></i>
                      <i class="iconcom-txtunstar"></i>
                    </span>
                    <i>Mới mua về có cần sài hết pin r mới sạt k anh .
                      Vs lại pin 5000 mk sao sài mau hết vs lại nóng máy nữa </i>
                  </p>
                </div>
                <div class="rcf">
                  <p>Thegioididong.com xác nhận: <label><i class="iconcom-rtusr"></i><span>Khách hàng <b class="name">Lê
                          tân</b></span></label><label><i class="iconcom-rtadr"></i><span>Đã mua tại: <b>Ấp 5,Xã Lạc
                          Tấn,Huyện Tân Trụ ,Tỉnh Long An</b></span></label></p>
                  <div class="clr"></div>
                  <label><i class="iconcom-rttime"></i><span>Mua <b>3 ngày </b> trước</span></label>
                  <p></p>
                </div>
                <div class="ra">
                  <a href="javascript:showRatingCmtChild('r-41306816');" class="cmtr">Thảo luận</a>
                  <span>• </span>
                  <a href="javascript:likeRating(41306816);" class="cmtl" data-like="0"><i
                      class="iconcom-like"></i>Thích</a><span> • </span>
                  <a href="javascript:;" class="cmtd">2 ngày trước</a>
                </div>
              </li>
              <li class="rr-41306816 reply hide">
                <input placeholder="Nhập thảo luận của bạn">
                <a href="javascript:ratingRelply(41306816);" class="rrSend">GỬI</a>
                <div class="ifrl hide">
                  <span>Khách</span> | <a href="javascript:cmtEditName()">Nhập tên</a>
                </div>
              </li>
            </ul>
            <div class="clr"></div>
            <div class="pgrc">
              <div class="pagcomment"><span class="active">1</span><a href="javascript:ratingCmtList(2)"
                  title="trang 2">2</a><a href="javascript:ratingCmtList(3)" title="trang 3">3</a><a
                  href="javascript:ratingCmtList(4)" title="trang 4">4</a><span>...</span><a
                  href="javascript:ratingCmtList(8)" title="trang 8">8</a><a href="javascript:ratingCmtList(2)"
                  title="trang 2">»</a></div>
            </div>
          </div>
          <a class="rtpLnk" href="/dtdd/samsung-galaxy-a31/danh-gia">Xem tất cả đánh giá<span>›</span></a>
        </div>
        <div class="wrap_comment" title="Bình luận sản phẩm" id="comment" cmtcategoryid="2" siteid="1" detailid="216174"
          cateid="15" urlpage="" pagesize="5">
          <div class="tltCmt">
            <textarea id="txtEditor" name="" cols="" rows="" class="parent_input txtEditor"
              placeholder="Mời bạn để lại bình luận..." onclick="cmtaddcommentclick();"
              onkeyup="cmtaddcommentclick();"></textarea>
            <div class="sortcomment">
              <div class="statistical hide" id="notifycmtmsg">Bình luận mới vừa được thêm vào. <a
                  href="javascript:void(0)">Click để xem</a></div>
            </div>
            <div class="clr"></div>
            <div class="midcmt">
              <span class="totalcomment">576 bình luận <span class="tech" onclick="showCmtTech();"><i
                    class="iconcom-uncheck"></i>Xem bình luận kỹ thuật</span> </span>
              <div class="s_comment">
                <form method="post" onsubmit="return false;"> <input class="cmtKey" type="text"
                    placeholder="Tìm theo nội dung, người gửi..." onkeyup="cmtSearch(event);"> <i
                    class="iconcom-search"></i> </form>
              </div>
              <div class="fts_comment" data-val="0"> <span class="c_lbl">Sắp xếp theo</span> <span class="c_ods c_ods_d"
                  onclick="cmt_selOdSeach(0)"><i class="iconcom-radcheck"></i>&nbsp;Độ chính xác</span> <span
                  class="c_ods c_ods_m" onclick="cmt_selOdSeach(1)"><i class="iconcom-raduncheck"></i>&nbsp;Mới
                  nhất</span> </div>
            </div>
          </div>
          <ul class="listcomment">
            <li class="comment_ask" id="41345230">
              <div class="rowuser">
                <a href="javascript:void(0)">
                  <div>Ú</div>
                  <strong onclick="selCmt(41345230)">Út</strong>
                </a>
              </div>
              <div class="question"> Samung này của hãn nào</div>
              <div class="actionuser" data-cl="0"><a href="javascript:void(0)" class="respondent"
                  onclick="cmtaddreplyclick(41345230)">Trả lời</a><a href="javascript:void(0)" class="time"
                  onclick="cmtReport(41345230)">4 giờ trước </a></div>
              <div class="listreply" id="r41345230">
                <div class="reply " id="41345296" data-parent="41345230">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div class="c"><i class="iconcom-avactv"></i></div>
                      <strong onclick="selCmt(41345296)">Trần Thanh Thiên</strong><b class="qtv">Quản trị viên</b>
                    </a>
                  </div>
                  <div class="cont">Chào chị<br>Dạ với điện này Samsung này là của hãng Samsung đến từ Hàn Quốc đó chị
                    nhé. Nếu quan tâm sản phẩm thì mình vui lòng cung cấp thông tin khu vực mình đang sinh sống cụ thể
                    (phường/xã, quận/huyện, tỉnh/thành phố) để bên em hỗ trợ kiểm tra tình trạng hàng hiện tại ở khu vực
                    của chị ạ.<br>Mong phản hồi từ chị.</div>
                  <div class="actionuser" data-cl="0">
                    <a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41345296,41345230)">Trả lời</a><a
                      href="javascript:satisfiedCmt(41345296);" class="favor satis cmthl"><i
                        class="iconcom-like"></i>Hài lòng<span></span></a><a href="javascript:unsatisfiedCmt(41345296);"
                      class="favor satis cmtkhl"><i class="iconcom-unlike"></i>Không hài lòng<span></span></a><a
                      href="javascript:void(0)" class="time" onclick="cmtReport(41345296)">4 giờ trước </a>
                    <div id="wrs41345296" class="wrapsatis" style="display: none;">
                      <div class="wrsct"><i class="iconcom-close" onclick="closeSatis();"></i><span>Thegioididong.com
                          rất tiếc đã làm bạn chưa hài lòng. Mời bạn góp ý để <b>QTV Trần Thanh Thiên</b> phục vụ tốt
                          hơn:</span><textarea placeholder="Nhập nội dung góp ý" type="text"
                          class="ustCt"></textarea><span>Hãy để lại thông tin để được hỗ trợ khi cần thiết (không bắt
                          buộc):</span><input placeholder="Họ tên" type="text" class="ustName"><input
                          placeholder="Số điện thoại" type="text" class="ustPhone"><a
                          href="javascript:sendUnSatisfied(41345296)">GỬI</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="inputreply hide"></div>
            </li>
            <li class="comment_ask" id="41344857">
              <div class="rowuser">
                <a href="javascript:void(0)">
                  <div>t</div>
                  <strong onclick="selCmt(41344857)">Lê Tân</strong>
                </a>
              </div>
              <div class="question"> Sao pin 5000 mk sài có ngày v</div>
              <div class="actionuser" data-cl="0"><a href="javascript:void(0)" class="respondent"
                  onclick="cmtaddreplyclick(41344857)">Trả lời</a><a href="javascript:void(0)" class="time"
                  onclick="cmtReport(41344857)">4 giờ trước </a></div>
              <div class="listreply" id="r41344857">
                <div class="reply " id="41344884" data-parent="41344857">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div class="c"><i class="iconcom-avactv"></i></div>
                      <strong onclick="selCmt(41344884)">Thanh Thủy</strong><b class="qtv">Quản trị viên</b>
                    </a>
                  </div>
                  <div class="cont">
                    Dạ chào anh&nbsp;<br>Dạ với 5000mAh, Samsung Galaxy A31 có thể dùng liên tục (tác vụ thông thường)
                    khoảng 6 - 7 tiếng; dùng cách khoảng có thể đủ một ngày ạ. (Thời lượng sử dụng pin có thể thay đổi
                    tùy theo ứng dụng, độ sáng, âm lượng, nhiệt độ và các yếu tố khác tác động)<br>
                    <ul>
                      <li>Xin thông tin đến anh ạ!&nbsp;</li>
                    </ul>
                  </div>
                  <div class="actionuser" data-cl="0">
                    <a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41344884,41344857)">Trả lời</a><a
                      href="javascript:satisfiedCmt(41344884);" class="favor satis cmthl"><i
                        class="iconcom-like"></i>Hài lòng<span></span></a><a href="javascript:unsatisfiedCmt(41344884);"
                      class="favor satis cmtkhl"><i class="iconcom-unlike"></i>Không hài lòng<span></span></a><a
                      href="javascript:void(0)" class="time" onclick="cmtReport(41344884)">4 giờ trước </a>
                    <div id="wrs41344884" class="wrapsatis" style="display: none;">
                      <div class="wrsct"><i class="iconcom-close" onclick="closeSatis();"></i><span>Thegioididong.com
                          rất tiếc đã làm bạn chưa hài lòng. Mời bạn góp ý để <b>QTV Thanh Thủy</b> phục vụ tốt
                          hơn:</span><textarea placeholder="Nhập nội dung góp ý" type="text"
                          class="ustCt"></textarea><span>Hãy để lại thông tin để được hỗ trợ khi cần thiết (không bắt
                          buộc):</span><input placeholder="Họ tên" type="text" class="ustName"><input
                          placeholder="Số điện thoại" type="text" class="ustPhone"><a
                          href="javascript:sendUnSatisfied(41344884)">GỬI</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="inputreply hide"></div>
            </li>
            <li class="comment_ask" id="41342702">
              <div class="rowuser">
                <a href="javascript:void(0)">
                  <div>T</div>
                  <strong onclick="selCmt(41342702)">Nguyen Thi Thuy Trinh</strong>
                </a>
              </div>
              <div class="question"> May anh camera truoc va sau den thui.ko chup hinh dc la bi sau z shop</div>
              <div class="actionuser" data-cl="0"><a href="javascript:void(0)" class="respondent"
                  onclick="cmtaddreplyclick(41342702)">Trả lời</a><a href="javascript:void(0)" class="time"
                  onclick="cmtReport(41342702)">6 giờ trước </a></div>
              <div class="listreply" id="r41342702">
                <div class="reply " id="41342752" data-parent="41342702">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div class="c"><i class="iconcom-avactv"></i></div>
                      <strong onclick="selCmt(41342752)">Đức Thành</strong><b class="qtv">Quản trị viên</b>
                    </a>
                  </div>
                  <div class="cont">Chào chị!&nbsp;<br>Dạ trường hợp trên thì chị thử khởi động lại máy sau
                    đó kiểm tra lại xem có còn xảy ra hiện tượng trên nữa không ạ.<br>Mong phản hồi từ chị
                    ạ.<br><br><br></div>
                  <div class="actionuser" data-cl="0">
                    <a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41342752,41342702)">Trả lời</a><a
                      href="javascript:satisfiedCmt(41342752);" class="favor satis cmthl"><i
                        class="iconcom-like"></i>Hài lòng<span></span></a><a href="javascript:unsatisfiedCmt(41342752);"
                      class="favor satis cmtkhl"><i class="iconcom-unlike"></i>Không hài lòng<span></span></a><a
                      href="javascript:void(0)" class="time" onclick="cmtReport(41342752)">6 giờ trước </a>
                    <div id="wrs41342752" class="wrapsatis" style="display: none;">
                      <div class="wrsct"><i class="iconcom-close" onclick="closeSatis();"></i><span>Thegioididong.com
                          rất tiếc đã làm bạn chưa hài lòng. Mời bạn góp ý để <b>QTV Đức Thành</b> phục vụ tốt
                          hơn:</span><textarea placeholder="Nhập nội dung góp ý" type="text"
                          class="ustCt"></textarea><span>Hãy để lại thông tin để được hỗ trợ khi cần thiết (không bắt
                          buộc):</span><input placeholder="Họ tên" type="text" class="ustName"><input
                          placeholder="Số điện thoại" type="text" class="ustPhone"><a
                          href="javascript:sendUnSatisfied(41342752)">GỬI</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="inputreply hide"></div>
            </li>
            <li class="comment_ask" id="41342625">
              <div class="rowuser">
                <a href="javascript:void(0)">
                  <div>K</div>
                  <strong onclick="selCmt(41342625)">Khang</strong>
                </a>
              </div>
              <div class="question"> Cho em hỏi muốn xem xếp hạng các chip trên smartphone thì xem ở đâu là tốt nhất ạ
              </div>
              <div class="actionuser" data-cl="0"><a href="javascript:void(0)" class="respondent"
                  onclick="cmtaddreplyclick(41342625)">Trả lời</a><a href="javascript:void(0)" class="time"
                  onclick="cmtReport(41342625)">6 giờ trước </a></div>
              <div class="listreply" id="r41342625">
                <div class="reply " id="41342701" data-parent="41342625">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div class="c"><i class="iconcom-avactv"></i></div>
                      <strong onclick="selCmt(41342701)">Lê Huỳnh</strong><b class="qtv">Quản trị viên</b>
                    </a>
                  </div>
                  <div class="cont">
                    <p>Chào anh,&nbsp;<br>Dạ về bảng xếp hạng chip trên&nbsp;smartphone thì mình nên xem ở trang
                      Notebookcheck là tốt nhất anh nhé.</p>
                    <p>Thông tin đến anh !&nbsp;</p>
                  </div>
                  <div class="actionuser" data-cl="0">
                    <a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41342701,41342625)">Trả lời</a><a
                      href="javascript:satisfiedCmt(41342701);" class="favor satis cmthl"><i
                        class="iconcom-like"></i>Hài lòng<span></span></a><a href="javascript:unsatisfiedCmt(41342701);"
                      class="favor satis cmtkhl"><i class="iconcom-unlike"></i>Không hài lòng<span></span></a><a
                      href="javascript:void(0)" class="time" onclick="cmtReport(41342701)">6 giờ trước </a>
                    <div id="wrs41342701" class="wrapsatis" style="display: none;">
                      <div class="wrsct"><i class="iconcom-close" onclick="closeSatis();"></i><span>Thegioididong.com
                          rất tiếc đã làm bạn chưa hài lòng. Mời bạn góp ý để <b>QTV Lê Huỳnh</b> phục vụ tốt
                          hơn:</span><textarea placeholder="Nhập nội dung góp ý" type="text"
                          class="ustCt"></textarea><span>Hãy để lại thông tin để được hỗ trợ khi cần thiết (không bắt
                          buộc):</span><input placeholder="Họ tên" type="text" class="ustName"><input
                          placeholder="Số điện thoại" type="text" class="ustPhone"><a
                          href="javascript:sendUnSatisfied(41342701)">GỬI</a></div>
                    </div>
                  </div>
                </div>
                <div class="reply " id="41342800" data-parent="41342625">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div>K</div>
                      <strong onclick="selCmt(41342800)">Khang</strong>
                    </a>
                  </div>
                  <div class="cont"> Có link không ạ cho em xin</div>
                  <div class="actionuser" data-cl="0"><a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41342800,41342625)">Trả lời</a><a href="javascript:void(0)"
                      class="time" onclick="cmtReport(41342800)">6 giờ trước </a></div>
                </div>
                <div class="fullcomment" onclick="showFullCmt(41342625)"><i class="iconcom-comblue"></i> Xem tiếp 2 trả
                  lời khác ▾</div>
                <div class="reply hide" id="41342963" data-parent="41342625">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div class="c"><i class="iconcom-avactv"></i></div>
                      <strong onclick="selCmt(41342963)">Dương Phi</strong><b class="qtv">Quản trị viên</b>
                    </a>
                  </div>
                  <div class="cont">Dạ anh có thể tham khảo bảng xếp hạng các chip Smartphone&nbsp;<a target="_blank"
                      rel="nofollow"
                      href="https://www.notebookcheck.net/Smartphone-Processors-Benchmark-List.149513.0.html">tại
                      đây</a> anh nhé.<br>Xin thông tin đến anh.&nbsp;</div>
                  <div class="actionuser" data-cl="0">
                    <a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41342963,41342625)">Trả lời</a><a
                      href="javascript:satisfiedCmt(41342963);" class="favor satis cmthl"><i
                        class="iconcom-like"></i>Hài lòng<span></span></a><a href="javascript:unsatisfiedCmt(41342963);"
                      class="favor satis cmtkhl"><i class="iconcom-unlike"></i>Không hài lòng<span></span></a><a
                      href="javascript:void(0)" class="time" onclick="cmtReport(41342963)">6 giờ trước </a>
                    <div id="wrs41342963" class="wrapsatis" style="display: none;">
                      <div class="wrsct"><i class="iconcom-close" onclick="closeSatis();"></i><span>Thegioididong.com
                          rất tiếc đã làm bạn chưa hài lòng. Mời bạn góp ý để <b>QTV Dương Phi</b> phục vụ tốt
                          hơn:</span><textarea placeholder="Nhập nội dung góp ý" type="text"
                          class="ustCt"></textarea><span>Hãy để lại thông tin để được hỗ trợ khi cần thiết (không bắt
                          buộc):</span><input placeholder="Họ tên" type="text" class="ustName"><input
                          placeholder="Số điện thoại" type="text" class="ustPhone"><a
                          href="javascript:sendUnSatisfied(41342963)">GỬI</a></div>
                    </div>
                  </div>
                </div>
                <div class="reply hide" id="41342970" data-parent="41342625">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div>K</div>
                      <strong onclick="selCmt(41342970)">Khang</strong>
                    </a>
                  </div>
                  <div class="cont"> Em cảm ơn ạ</div>
                  <div class="actionuser" data-cl="0"><a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41342970,41342625)">Trả lời</a><a href="javascript:void(0)"
                      class="time" onclick="cmtReport(41342970)">6 giờ trước </a></div>
                </div>
              </div>
              <div class="inputreply hide"></div>
            </li>
            <li class="comment_ask" id="41341117">
              <div class="rowuser">
                <a href="javascript:void(0)">
                  <div>M</div>
                  <strong onclick="selCmt(41341117)">Quỳnh Meo</strong>
                </a>
              </div>
              <div class="question">
                Giúp em với ạ, em cần gấp
                <div class="imgCmt"><img class="lazy"
                    data-original="https://cdn.tgdd.vn/comment/41341117/9110D7A1-89C0-4B17-8B11-A721F565D490LX578.jpeg"
                    onclick="openCmtSlide(41341117,0)"
                    src="https://cdn.tgdd.vn/comment/41341117/9110D7A1-89C0-4B17-8B11-A721F565D490LX578.jpeg"
                    style="display: block;"></div>
              </div>
              <div class="actionuser" data-cl="0"><a href="javascript:void(0)" class="respondent"
                  onclick="cmtaddreplyclick(41341117)">Trả lời</a><a href="javascript:void(0)" class="time"
                  onclick="cmtReport(41341117)">8 giờ trước </a></div>
              <div class="listreply" id="r41341117">
                <div class="reply " id="41341182" data-parent="41341117">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div class="c"><i class="iconcom-avactv"></i></div>
                      <strong onclick="selCmt(41341182)">Đức Thành</strong><b class="qtv">Quản trị viên</b>
                    </a>
                  </div>
                  <div class="cont">Chào chị!&nbsp;<br>Dạ trường hợp trên thì chị có thể chọn đáp án D là
                    mạng có hai loại dựa vào mạng không dây là trên điện thoại và mạng Wifi đó ạ.<br>Thông
                    tin đến chị.&nbsp;</div>
                  <div class="actionuser" data-cl="0">
                    <a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41341182,41341117)">Trả lời</a><a
                      href="javascript:satisfiedCmt(41341182);" class="favor satis cmthl"><i
                        class="iconcom-like"></i>Hài lòng<span></span></a><a href="javascript:unsatisfiedCmt(41341182);"
                      class="favor satis cmtkhl"><i class="iconcom-unlike"></i>Không hài lòng<span></span></a><a
                      href="javascript:void(0)" class="time" onclick="cmtReport(41341182)">8 giờ trước </a>
                    <div id="wrs41341182" class="wrapsatis" style="display: none;">
                      <div class="wrsct"><i class="iconcom-close" onclick="closeSatis();"></i><span>Thegioididong.com
                          rất tiếc đã làm bạn chưa hài lòng. Mời bạn góp ý để <b>QTV Đức Thành</b> phục vụ tốt
                          hơn:</span><textarea placeholder="Nhập nội dung góp ý" type="text"
                          class="ustCt"></textarea><span>Hãy để lại thông tin để được hỗ trợ khi cần thiết (không bắt
                          buộc):</span><input placeholder="Họ tên" type="text" class="ustName"><input
                          placeholder="Số điện thoại" type="text" class="ustPhone"><a
                          href="javascript:sendUnSatisfied(41341182)">GỬI</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="inputreply hide"></div>
            </li>
            <li class="comment_ask" id="41341052">
              <div class="rowuser">
                <a href="javascript:void(0)">
                  <div>M</div>
                  <strong onclick="selCmt(41341052)">Quỳnh Meo</strong>
                </a>
              </div>
              <div class="question"> Cho em hỏi băng thông là gì ạ</div>
              <div class="actionuser" data-cl="0"><a href="javascript:void(0)" class="respondent"
                  onclick="cmtaddreplyclick(41341052)">Trả lời</a><a href="javascript:void(0)" class="time"
                  onclick="cmtReport(41341052)">8 giờ trước </a></div>
              <div class="listreply" id="r41341052">
                <div class="reply " id="41341120" data-parent="41341052">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div class="c"><i class="iconcom-avactv"></i></div>
                      <strong onclick="selCmt(41341120)">Đức Thành</strong><b class="qtv">Quản trị viên</b>
                    </a>
                  </div>
                  <div class="cont">Chào chị!&nbsp;<br>Dạ trường hợp trên thì tốc độ mở của&nbsp;mạng
                    internet&nbsp;đó chị nhé.<br>Thông tin đến chị.&nbsp;</div>
                  <div class="actionuser" data-cl="0">
                    <a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41341120,41341052)">Trả lời</a><a
                      href="javascript:satisfiedCmt(41341120);" class="favor satis cmthl"><i
                        class="iconcom-like"></i>Hài lòng<span></span></a><a href="javascript:unsatisfiedCmt(41341120);"
                      class="favor satis cmtkhl"><i class="iconcom-unlike"></i>Không hài lòng<span></span></a><a
                      href="javascript:void(0)" class="time" onclick="cmtReport(41341120)">8 giờ trước </a>
                    <div id="wrs41341120" class="wrapsatis" style="display: none;">
                      <div class="wrsct"><i class="iconcom-close" onclick="closeSatis();"></i><span>Thegioididong.com
                          rất tiếc đã làm bạn chưa hài lòng. Mời bạn góp ý để <b>QTV Đức Thành</b> phục vụ tốt
                          hơn:</span><textarea placeholder="Nhập nội dung góp ý" type="text"
                          class="ustCt"></textarea><span>Hãy để lại thông tin để được hỗ trợ khi cần thiết (không bắt
                          buộc):</span><input placeholder="Họ tên" type="text" class="ustName"><input
                          placeholder="Số điện thoại" type="text" class="ustPhone"><a
                          href="javascript:sendUnSatisfied(41341120)">GỬI</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="inputreply hide"></div>
            </li>
            <li class="comment_ask" id="41339564">
              <div class="rowuser">
                <a href="javascript:void(0)">
                  <div>l</div>
                  <strong onclick="selCmt(41339564)">Đăng Thi Ngọc Lan</strong>
                </a>
              </div>
              <div class="question"> Cho e hỏi e đang trả góp bên fe e mua trả góp nữa dc hk za</div>
              <div class="actionuser" data-cl="0"><a href="javascript:void(0)" class="respondent"
                  onclick="cmtaddreplyclick(41339564)">Trả lời</a><a href="javascript:void(0)" class="time"
                  onclick="cmtReport(41339564)">9 giờ trước </a></div>
              <div class="listreply" id="r41339564">
                <div class="reply " id="41339592" data-parent="41339564">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div class="c"><i class="iconcom-avactv"></i></div>
                      <strong onclick="selCmt(41339592)">Minh Hoàng</strong><b class="qtv">Quản trị viên</b>
                    </a>
                  </div>
                  <div class="cont">Chào chị !<br>Dạ chị có thể đăng ký qua Home Credit và chờ xét duyệt giúp em, nếu
                    duyệt thành công mới được nhận máy ạ, nếu mình có CMND, Hộ khẩu hoặc Bằng lái xe tham khảo gói đưa
                    trước 30% khoảng&nbsp;1.947.000đ, góp 6 tháng mỗi tháng khoảng&nbsp;790.500đ, lãi suất 0% của Home
                    Credit ạ. Nếu đồng ý gói trả góp này thì chị có thể cho bên em xin thông tin số điện thoại bên em hỗ
                    trợ làm hồ sơ Online cho chị nha.&nbsp;<br>Mong nhận được phản hồi từ chị.&nbsp;</div>
                  <div class="actionuser" data-cl="0">
                    <a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41339592,41339564)">Trả lời</a><a
                      href="javascript:satisfiedCmt(41339592);" class="favor satis cmthl"><i
                        class="iconcom-like"></i>Hài lòng<span></span></a><a href="javascript:unsatisfiedCmt(41339592);"
                      class="favor satis cmtkhl"><i class="iconcom-unlike"></i>Không hài lòng<span></span></a><a
                      href="javascript:void(0)" class="time" onclick="cmtReport(41339592)">9 giờ trước </a>
                    <div id="wrs41339592" class="wrapsatis" style="display: none;">
                      <div class="wrsct"><i class="iconcom-close" onclick="closeSatis();"></i><span>Thegioididong.com
                          rất tiếc đã làm bạn chưa hài lòng. Mời bạn góp ý để <b>QTV Minh Hoàng</b> phục vụ tốt
                          hơn:</span><textarea placeholder="Nhập nội dung góp ý" type="text"
                          class="ustCt"></textarea><span>Hãy để lại thông tin để được hỗ trợ khi cần thiết (không bắt
                          buộc):</span><input placeholder="Họ tên" type="text" class="ustName"><input
                          placeholder="Số điện thoại" type="text" class="ustPhone"><a
                          href="javascript:sendUnSatisfied(41339592)">GỬI</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="inputreply hide"></div>
            </li>
            <li class="comment_ask" id="41338710">
              <div class="rowuser">
                <a href="javascript:void(0)">
                  <div>N</div>
                  <strong onclick="selCmt(41338710)">Nam</strong>
                </a>
              </div>
              <div class="question"> Bên mình đang có chương trình thu cũ để lên đời mấy mới là ntn ạ...E đang dùng s8
                muốn lên con a31 này thì bù khoảng bao nhiêu ạ</div>
              <div class="actionuser" data-cl="0"><a href="javascript:void(0)" class="respondent"
                  onclick="cmtaddreplyclick(41338710)">Trả lời</a><a href="javascript:void(0)" class="time"
                  onclick="cmtReport(41338710)">10 giờ trước </a></div>
              <div class="listreply" id="r41338710">
                <div class="reply " id="41338725" data-parent="41338710">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div class="c"><i class="iconcom-avactv"></i></div>
                      <strong onclick="selCmt(41338725)">Minh Hoàng</strong><b class="qtv">Quản trị viên</b>
                    </a>
                  </div>
                  <div class="cont">
                    <div class="conticon">
                      <div class="content_s"> Chào anh !<br>Dạ&nbsp;Samsung Galaxy A31 bên em không có chương trình thu
                        cũ đổi mới ạ, mong anh thông cảm ạ, chỉ hỗ trợ nếu&nbsp;sản phẩm anh mua mới tại
                        Thegioididong.com hoặc DienmayXANH.com, còn bảo hành, không bị trầy xước cấn móp, ngấm chất
                        lỏng, còn giữ nguyên tình trạng ban đầu, không bị lỗi do người dùng, còn đủ phụ kiện và khuyến
                        mãi kèm theo, sản phẩm không đang trả góp thì bên em có chính sách thu mua lại với giá 80% giá
                        sản phẩm trên hóa đơn (trong tháng đầu tiên, các tháng sau mỗi tháng cộng... <span
                          class="seeMore" onclick="expandCmtChild(41338725);">Xem tiếp ▾ </span></div>
                    </div>
                    <div class="content hide">Chào anh !<br>Dạ&nbsp;Samsung Galaxy A31 bên em không có chương trình thu
                      cũ đổi mới ạ, mong anh thông cảm ạ, chỉ hỗ trợ nếu&nbsp;sản phẩm anh mua mới tại Thegioididong.com
                      hoặc DienmayXANH.com, còn bảo hành, không bị trầy xước cấn móp, ngấm chất lỏng, còn giữ nguyên
                      tình trạng ban đầu, không bị lỗi do người dùng, còn đủ phụ kiện và khuyến mãi kèm theo, sản phẩm
                      không đang trả góp thì bên em có chính sách thu mua lại với giá 80% giá sản phẩm trên hóa đơn
                      (trong tháng đầu tiên, các tháng sau mỗi tháng cộng thêm 5% phí). Nếu sản phẩm của anh đủ các điều
                      kiện trên, anh vui lòng cung cấp thông tin số điện thoại mua hàng để bên em kiểm tra các thông tin
                      giúp mình và phản hồi đến anh được cụ thể hơn anh nhé.<br>Mong nhận được phản hồi từ anh.&nbsp;
                    </div>
                  </div>
                  <div class="actionuser" data-cl="0">
                    <a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41338725,41338710)">Trả lời</a><a
                      href="javascript:satisfiedCmt(41338725);" class="favor satis cmthl"><i
                        class="iconcom-like"></i>Hài lòng<span></span></a><a href="javascript:unsatisfiedCmt(41338725);"
                      class="favor satis cmtkhl"><i class="iconcom-unlike"></i>Không hài lòng<span></span></a><a
                      href="javascript:void(0)" class="time" onclick="cmtReport(41338725)">10 giờ trước </a>
                    <div id="wrs41338725" class="wrapsatis" style="display: none;">
                      <div class="wrsct"><i class="iconcom-close" onclick="closeSatis();"></i><span>Thegioididong.com
                          rất tiếc đã làm bạn chưa hài lòng. Mời bạn góp ý để <b>QTV Minh Hoàng</b> phục vụ tốt
                          hơn:</span><textarea placeholder="Nhập nội dung góp ý" type="text"
                          class="ustCt"></textarea><span>Hãy để lại thông tin để được hỗ trợ khi cần thiết (không bắt
                          buộc):</span><input placeholder="Họ tên" type="text" class="ustName"><input
                          placeholder="Số điện thoại" type="text" class="ustPhone"><a
                          href="javascript:sendUnSatisfied(41338725)">GỬI</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="inputreply hide"></div>
            </li>
            <li class="comment_ask" id="41338030">
              <div class="rowuser">
                <a href="javascript:void(0)">
                  <div>P</div>
                  <strong onclick="selCmt(41338030)">Phươngtn90</strong>
                </a>
              </div>
              <div class="question"> Cho t hỏi điều hướng cử chỉ như thế nào? Vuốt thế nào để back? Vuốt từ dưới lên bên
                cạnh trái/ phải hay vuốt ngang từ 2 bên cạnh máy? Home và đa nhiệm thì sao? Trên Android 10</div>
              <div class="actionuser" data-cl="0"><a href="javascript:void(0)" class="respondent"
                  onclick="cmtaddreplyclick(41338030)">Trả lời</a><a href="javascript:void(0)" class="time"
                  onclick="cmtReport(41338030)">11 giờ trước </a></div>
              <div class="listreply" id="r41338030">
                <div class="reply " id="41338116" data-parent="41338030">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div class="c"><i class="iconcom-avactv"></i></div>
                      <strong onclick="selCmt(41338116)">Thế Linh</strong><b class="qtv">Quản trị viên</b>
                    </a>
                  </div>
                  <div class="cont">Chào anh!&nbsp;<br>Dạ khi anh lên Android 10 thì anh vuốt từ cạnh dưới lên giữa màn
                    hình rồi giữ ở đó là đa nhiệm, còn vuốt lên là về home, còn vuốt từ cạnh màn hình ra giữa màn hình
                    là trở về anh nhé<br>Thông tin đến anh!&nbsp;</div>
                  <div class="actionuser" data-cl="0">
                    <a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41338116,41338030)">Trả lời</a><a
                      href="javascript:satisfiedCmt(41338116);" class="favor satis cmthl"><i
                        class="iconcom-like"></i>Hài lòng<span></span></a><a href="javascript:unsatisfiedCmt(41338116);"
                      class="favor satis cmtkhl"><i class="iconcom-unlike"></i>Không hài lòng<span></span></a><a
                      href="javascript:void(0)" class="time" onclick="cmtReport(41338116)">11 giờ trước </a>
                    <div id="wrs41338116" class="wrapsatis" style="display: none;">
                      <div class="wrsct"><i class="iconcom-close" onclick="closeSatis();"></i><span>Thegioididong.com
                          rất tiếc đã làm bạn chưa hài lòng. Mời bạn góp ý để <b>QTV Thế Linh</b> phục vụ tốt
                          hơn:</span><textarea placeholder="Nhập nội dung góp ý" type="text"
                          class="ustCt"></textarea><span>Hãy để lại thông tin để được hỗ trợ khi cần thiết (không bắt
                          buộc):</span><input placeholder="Họ tên" type="text" class="ustName"><input
                          placeholder="Số điện thoại" type="text" class="ustPhone"><a
                          href="javascript:sendUnSatisfied(41338116)">GỬI</a></div>
                    </div>
                  </div>
                </div>
                <div class="reply " id="41338220" data-parent="41338030">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div>P</div>
                      <strong onclick="selCmt(41338220)">Phươngtn90</strong>
                    </a>
                  </div>
                  <div class="cont"> @Thế Linh: Cám ơn bạn nhiều</div>
                  <div class="actionuser" data-cl="0"><a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41338220,41338030)">Trả lời</a><a href="javascript:void(0)"
                      class="time" onclick="cmtReport(41338220)">11 giờ trước </a></div>
                </div>
              </div>
              <div class="inputreply hide"></div>
            </li>
            <li class="comment_ask" id="41337441">
              <div class="rowuser">
                <a href="javascript:void(0)">
                  <div>T</div>
                  <strong onclick="selCmt(41337441)">Tèo</strong>
                </a>
              </div>
              <div class="question"> Làm sao để xóa vĩnh viễn Tk xiaomi vậy</div>
              <div class="actionuser" data-cl="0"><a href="javascript:void(0)" class="respondent"
                  onclick="cmtaddreplyclick(41337441)">Trả lời</a><a href="javascript:void(0)" class="time"
                  onclick="cmtReport(41337441)">12 giờ trước </a></div>
              <div class="listreply" id="r41337441">
                <div class="reply " id="41337552" data-parent="41337441">
                  <div class="rowuser">
                    <a href="javascript:void(0)">
                      <div class="c"><i class="iconcom-avactv"></i></div>
                      <strong onclick="selCmt(41337552)">Viên Chiêu</strong><b class="qtv">Quản trị viên</b>
                    </a>
                  </div>
                  <div class="cont">
                    <div class="conticon">
                      <div class="content_s"> Chào anh,&nbsp;<br>Dạ để xoá tài khoản Xiaomi anh làm theo các bước
                        sau<br>Bước 1: Truy cập vào liên kết Mi Cloud và đăng nhập tài khoản Mi Cloud mà anh muốn
                        xóa.<br>Bước 2: Sau khi đăng nhập xong tài khoản, anh bấm vào phần thông tin cá nhân và chọn
                        phần cài đặt.<br>Bước 3: Khi hoàn thành bước 2 anh hãy kéo xuống phía dưới sẽ thấy phần xóa tài
                        khoản.<br>Lưu Ý: Trước khi xóa tài khoản anh cần&nbsp;phải sao lưu hết các dữ liệu trên Mi Cloud
                        về máy tính hoặc điện thoại tránh trường hợp mất dữ liệu quan trọng. Trước khi xóa... <span
                          class="seeMore" onclick="expandCmtChild(41337552);">Xem tiếp ▾ </span></div>
                    </div>
                    <div class="content hide">Chào anh,&nbsp;<br>Dạ để xoá tài khoản Xiaomi anh làm theo các bước
                      sau<br>Bước 1: Truy cập vào liên kết Mi Cloud và đăng nhập tài khoản Mi Cloud mà anh muốn
                      xóa.<br>Bước 2: Sau khi đăng nhập xong tài khoản, anh bấm vào phần thông tin cá nhân và chọn phần
                      cài đặt.<br>Bước 3: Khi hoàn thành bước 2 anh hãy kéo xuống phía dưới sẽ thấy phần xóa tài
                      khoản.<br>Lưu Ý: Trước khi xóa tài khoản anh cần&nbsp;phải sao lưu hết các dữ liệu trên Mi Cloud
                      về máy tính hoặc điện thoại tránh trường hợp mất dữ liệu quan trọng. Trước khi xóa anh phải thoát
                      tài khoản Mi Cloud ra thì mới xóa được nhé.<br>Thông tin đến anh.&nbsp;</div>
                  </div>
                  <div class="actionuser" data-cl="0">
                    <a href="javascript:void(0)" class="respondent"
                      onclick="cmtChildAddReplyClick(41337552,41337441)">Trả lời</a><a
                      href="javascript:satisfiedCmt(41337552);" class="favor satis cmthl"><i
                        class="iconcom-like"></i>Hài lòng<span></span></a><a href="javascript:unsatisfiedCmt(41337552);"
                      class="favor satis cmtkhl"><i class="iconcom-unlike"></i>Không hài lòng<span></span></a><a
                      href="javascript:void(0)" class="time" onclick="cmtReport(41337552)">12 giờ trước </a>
                    <div id="wrs41337552" class="wrapsatis" style="display: none;">
                      <div class="wrsct"><i class="iconcom-close" onclick="closeSatis();"></i><span>Thegioididong.com
                          rất tiếc đã làm bạn chưa hài lòng. Mời bạn góp ý để <b>QTV Viên Chiêu</b> phục vụ tốt
                          hơn:</span><textarea placeholder="Nhập nội dung góp ý" type="text"
                          class="ustCt"></textarea><span>Hãy để lại thông tin để được hỗ trợ khi cần thiết (không bắt
                          buộc):</span><input placeholder="Họ tên" type="text" class="ustName"><input
                          placeholder="Số điện thoại" type="text" class="ustPhone"><a
                          href="javascript:sendUnSatisfied(41337552)">GỬI</a></div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="inputreply hide"></div>
            </li>
            <div class="pagcomment"><span class="active">1</span><a onclick="listcomment(2,1,2);return false;"
                title="trang 2">2</a><a onclick="listcomment(2,1,3);return false;" title="trang 3">3</a><a
                onclick="listcomment(2,1,4);return false;" title="trang 4">4</a><span>...</span><a
                onclick="listcomment(2,1,58);return false;" title="trang 58">58</a><a
                onclick="listcomment(2,1,2);return false;" title="trang 2">»</a></div>
          </ul>
          <textarea id="txtEditorExt" name="" cols="" rows="" class="txtEditor"
            placeholder="Mời Bạn để lại bình luận..."></textarea>
          <div class="ajaxcomment hide">
            <div id="loadcomment"></div>
          </div>
        </div>
      </div>
    </aside>
    <aside class="right_content">
      <div class="tableparameter">
        <h2>Thông số kỹ thuật</h2>
        <ul class="parameter ">
          <li class="p216174 g6459_79_77">
            <span>Màn hình:</span>
            <div><a href="https://www.thegioididong.com/hoi-dap/man-hinh-super-amoled-la-gi-905770"
                target="_blank">Super AMOLED</a>, 6.4", <a
                href="https://www.thegioididong.com/tin-tuc/do-phan-giai-man-hinh-qhd-hd-fullhd-2k-4k-la-gi--592178#fullhd"
                target="_blank">Full HD+</a></div>
          </li>
          <li class="p216174 g72">
            <span>Hệ điều hành:</span>
            <div><a href="https://www.thegioididong.com/hoi-dap/android-10-android-q-la-gi-co-gi-moi-1237224"
                target="_blank">Android 10</a></div>
          </li>
          <li class="p216174 g27">
            <span>Camera sau:</span>
            <div>Chính 48 MP &amp; Phụ 8 MP, 5 MP, 5 MP</div>
          </li>
          <li class="p216174 g29">
            <span>Camera trước:</span>
            <div>20 MP</div>
          </li>
          <li class="p216174 g6059">
            <span>CPU:</span>
            <div><a href="https://www.thegioididong.com/hoi-dap/tim-hieu-ve-chip-mediatek-mt6768-helio-p65-1180645"
                target="_blank">MediaTek MT6768 8 nhân (Helio P65)</a></div>
          </li>
          <li class="p216174 g50">
            <span>RAM:</span>
            <div>6 GB</div>
          </li>
          <li class="p216174 g49">
            <span>Bộ nhớ trong:</span>
            <div>128 GB</div>
          </li>
          <li class="p216174 g52">
            <span>Thẻ nhớ:</span>
            <div><a href="https://www.thegioididong.com/the-nho-dien-thoai" target="_blank">MicroSD, hỗ trợ tối đa 512
                GB</a></div>
          </li>
          <li class="g6339_6463">
            <span>Thẻ SIM:</span>
            <div class="isim"><a
                href="https://www.thegioididong.com/tin-tuc/tim-hieu-cac-loai-sim-thong-dung-sim-thuong-micro--590216#nanosim"
                target="_blank">2 Nano SIM</a>, <a href="https://www.thegioididong.com/hoi-dap/4g-la-gi-731757"
                target="_blank">Hỗ trợ 4G</a></div>
            <div class="ibsim"><b class="h">HOT</b><a
                href="https://www.thegioididong.com/sim-so-dep/vinaphone?t=100">SIM Vina Bùm 120 (2GB/ngày)</a></div>
          </li>
          <li class="p216174 g84_10882">
            <span>Dung lượng pin:</span>
            <div>5000 mAh, có sạc nhanh</div>
          </li>
        </ul>
        <button type="button" class="viewparameterfull" onclick="getFullSpec(216174,)">Xem thêm cấu hình chi
          tiết</button>
        <div class="closebtn none"><i class="icondetail-closepara"></i></div>
        <div class="fullparameter">
          <div class="scroll">
            <h3>Thông số kỹ thuật chi tiết Samsung Galaxy A31</h3>
            <img id="imgKit" width="500" height="430" alt="Thông số kỹ thuật 216174">
            <ul class="parameterfull"></ul>
          </div>
        </div>
      </div>
      <div class="clr"></div>
      <div class="newslist">
        <h4>Tin tức về Samsung Galaxy A31</h4>
        <ul>
          <li>
            <a href="/tin-tuc/samsung-da-du-kien-doanh-so-smartphone-va-tv-cua-h-1253481">
              <img data-original="https://cdn.tgdd.vn/Files/2020/05/04/1253481/logosamsung_800x450-300x200.jpg"
                class="lazy" src="https://cdn.tgdd.vn/Files/2020/05/04/1253481/logosamsung_800x450-300x200.jpg"
                style="display: block;">
              <h3>Samsung đưa ra dự báo về doanh số smartphone và TV của hãng sẽ tiếp tục giảm vào Q2/2020</h3>
            </a>
          </li>
          <li>
            <a href="/tin-tuc/galaxy-a-quantum-smartphone-5g-co-cong-nghe-ma-hoa-1255835">
              <img data-original="https://cdn.tgdd.vn/Files/2020/05/16/1255835/samsungquantum_800x450-300x200.jpg"
                class="lazy" src="https://cdn.tgdd.vn/Files/2020/05/16/1255835/samsungquantum_800x450-300x200.jpg"
                style="display: block;">
              <h3>Galaxy A Quantum ra mắt: Smartphone 5G đầu tiên trên thế giới có công nghệ mã hóa lượng tử, không thể
                bị hack</h3>
            </a>
          </li>
          <li>
            <a href="/tin-tuc/galaxy-a21s-am-tham-ra-mat-co-4-camera-sau-1255732">
              <img data-original="https://cdn.tgdd.vn/Files/2020/05/15/1255732/2_1280x720-300x200.jpg" class="lazy"
                src="https://cdn.tgdd.vn/Files/2020/05/15/1255732/2_1280x720-300x200.jpg" style="display: block;">
              <h3>Galaxy A21s âm thầm ra mắt, nằm ở phân khúc giá rẻ nhưng có 4 camera sau, trong đó có máy ảnh macro
                chụp cận cảnh, pin 5.000 mAh hỗ trợ sạc nhanh</h3>
              <span><i class="icontgdd-com"></i>1 Bình luận</span>
            </a>
          </li>
        </ul>
        <a href="/tin-tuc/san-pham/samsung-galaxy-a31-216174" class="viewall">Xem tất cả các tin liên quan</a>
      </div>
      <div class="accessories borderBot">
        <div>
          <h3>Phụ kiện Samsung Galaxy A31</h3>
        </div>
        <ul>
          <li>
            <a href="/tai-nghe/tai-nghe-bluetooth-roman-r552n-xanh">
              <img
                data-original="https://cdn.tgdd.vn/Products/Images/54/143410/tai-nghe-bluetooth-roman-r552n-xanh-avatar-2-600x600.jpg"
                class="lazy"
                src="https://cdn.tgdd.vn/Products/Images/54/143410/tai-nghe-bluetooth-roman-r552n-xanh-avatar-2-600x600.jpg"
                style="display: block;">
              <h3>Tai nghe Bluetooth Roman R552N Xanh</h3>
              <strong class="gs">199.000₫</strong>
              <strong class="gg">300.000₫</strong>
            </a>
            <a href="/them-vao-gio-hang?ProductId=143410" class="buyacc">Mua</a>
          </li>
          <li>
            <a href="/sac-dtdd/pin-sac-du-phong-polymer-10000mah-ava-pj-jp196-den">
              <img
                data-original="https://cdn.tgdd.vn/Products/Images/57/217434/pin-sac-du-phong-polymer-10000mah-ava-pj-jp196-den-1-600x600.jpg"
                class="lazy"
                src="https://cdn.tgdd.vn/Products/Images/57/217434/pin-sac-du-phong-polymer-10000mah-ava-pj-jp196-den-1-600x600.jpg"
                style="display: block;">
              <h3>Pin sạc dự phòng Polymer 10.000mAh AVA PJ JP196 Đen</h3>
              <strong class="gs">349.000₫</strong>
              <strong class="gg">450.000₫</strong>
            </a>
            <a href="/them-vao-gio-hang?ProductId=217434" class="buyacc">Mua</a>
          </li>
          <li>
            <a href="/cap-dien-thoai/cap-type-c-1m-iwalk-csc003-den">
              <img
                data-original="https://cdn.tgdd.vn/Products/Images/58/208854/cap-type-c-1m-iwalk-csc003-den-600x600.jpg"
                class="lazy"
                src="https://cdn.tgdd.vn/Products/Images/58/208854/cap-type-c-1m-iwalk-csc003-den-600x600.jpg"
                style="display: block;">
              <h3>Cáp Type-C 1 m iWALK CSC003 Đen</h3>
              <strong class="gs">169.000₫</strong>
              <strong class="gg">199.000₫</strong>
              <label class="per">Giảm 15%</label>
            </a>
            <a href="/them-vao-gio-hang?ProductId=208854" class="buyacc">Mua</a>
          </li>
          <li>
            <a href="/op-lung-flipcover/op-lung-galaxy-a51-a31-nhua-deo-nake-slim-jm-nude">
              <img
                data-original="https://cdn.tgdd.vn/Products/Images/60/217579/op-lung-galaxy-a51-nhua-deo-nake-slim-jm-nude-1-600x600.jpg"
                class="lazy"
                src="https://cdn.tgdd.vn/Products/Images/60/217579/op-lung-galaxy-a51-nhua-deo-nake-slim-jm-nude-1-600x600.jpg"
                style="display: block;">
              <h3>Ốp lưng Galaxy A51/A31 Nhựa dẻo Nake slim JM Nude</h3>
              <strong>50.000₫</strong>
            </a>
            <a href="/them-vao-gio-hang?ProductId=217579" class="buyacc">Mua</a>
          </li>
          <li>
            <a href="/loa-laptop/loa-bluetooth-fenda-w8">
              <img
                data-original="https://cdn.tgdd.vn/Products/Images/2162/183512/loa-bluetooth-fenda-w8-avatar-1-600x600.jpg"
                class="lazy"
                src="https://cdn.tgdd.vn/Products/Images/2162/183512/loa-bluetooth-fenda-w8-avatar-1-600x600.jpg"
                style="display: block;">
              <h3>Loa Bluetooth Fenda W8</h3>
              <strong class="gs">349.000₫</strong>
              <strong class="gg">500.000₫</strong>
            </a>
            <a href="/them-vao-gio-hang?ProductId=183512" class="buyacc">Mua</a>
          </li>
        </ul>
        <a class="viewall" href="/phu-kien/dtdd/samsung-galaxy-a31">Xem tất cả phụ kiện Samsung Galaxy A31</a>
      </div>
    </aside>
  </div>
  <div class="clr"></div>
</section>
@stop