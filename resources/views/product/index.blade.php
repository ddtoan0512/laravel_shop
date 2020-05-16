@extends('layouts.app')
@section('content')

<style>
  /* 11:29:37 15/05/2020 */
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

  /* 02:01:52 11/02/2020 */
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

  /* 11:29:37 15/05/2020 */
  .icontgdd-checkbox {
    background-position: -145px -30px;
    width: 16px;
    height: 16px;
    vertical-align: sub;
    margin-right: 3px
  }

  .icontgdd-closefilter {
    background-position: -205px -30px;
    width: 18px;
    height: 18px
  }

  .icontgdd-checklist {
    background-position: -185px -30px;
    width: 16px;
    height: 14px
  }

  .icontgdd-gstar {
    background-position: -310px -30px;
    width: 12px;
    height: 12px
  }

  .icontgdd-ystar {
    background-position: -295px -30px;
    width: 12px;
    height: 12px
  }

  .icontgdd-hstar {
    background-position: -423px -30px;
    width: 12px;
    height: 12px
  }

  .topbanner {
    display: block;
    margin: 55px 0 -45px;
    overflow: hidden;
    height: 210px;
    background-position: center top;
    background-repeat: no-repeat
  }

  section.cate {
    min-width: 1200px
  }

  .banner {
    padding-top: 10px;
    overflow: hidden
  }

  .banner #owl-home {
    width: 800px;
    float: left;
    height: 170px
  }

  .banner #owl-home .owl-controls {
    margin-top: -30px;
    position: relative;
    z-index: 3
  }

  .banner #owl-home>a:nth-child(n+2) {
    display: none
  }

  .banner #owl-home .owl-prev {
    position: absolute;
    left: 10px;
    padding: 12px 0 0;
    margin: 0;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    background: rgba(0, 0, 0, .3);
    width: 48px;
    height: 40px;
    text-align: center;
    font-size: 46px;
    color: #fff;
    font-family: -webkit-body;
    top: -87px;
    display: none
  }

  .banner #owl-home .owl-next {
    position: absolute;
    right: 10px;
    padding: 12px 0 0;
    margin: 0;
    border-radius: 5px;
    -webkit-border-radius: 5px;
    -moz-border-radius: 5px;
    background: rgba(0, 0, 0, .3);
    width: 48px;
    height: 40px;
    text-align: center;
    font-size: 46px;
    color: #fff;
    font-family: -webkit-body;
    top: -87px;
    display: none
  }

  .banner #owl-home:hover .owl-prev,
  #owl-home:hover .owl-next {
    display: block
  }

  .banner .right {
    float: right;
    width: 390px
  }

  .banner .right a {
    display: block;
    height: 80px;
    overflow: hidden
  }

  .banner .right a:first-child {
    margin-bottom: 10px
  }

  .banner .right a img {
    display: block;
    max-width: 100%
  }

  .filter {
    padding: 10px 0
  }

  .filter .check .icontgdd-checkbox {
    background-position: -165px -30px
  }

  .filter .fl {
    float: left;
    margin-right: 10px
  }

  .filter .fl label {
    color: #333
  }

  .filter .fl a span {
    position: absolute;
    right: -25px;
    top: 5px;
    color: #fff;
    background-color: #f00;
    font-size: 10px;
    border-radius: 3px;
    padding: 0 3px;
    line-height: 1.3
  }

  .filter .fr {
    float: right
  }

  .filter .criteria,
  .filter .selected {
    display: inline-block;
    overflow: hidden;
    color: #288ad6;
    cursor: pointer;
    line-height: 40px
  }

  .filter .criteria:after {
    content: '';
    width: 0;
    height: 0;
    border-top: 6px solid #288ad6;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    display: inline-block;
    vertical-align: middle;
    margin-left: 5px
  }

  .filter .closefilter {
    position: absolute;
    right: 5px;
    top: 5px;
    z-index: 2
  }

  .filter .manu {
    padding: 0 0 11px 1px;
    overflow: hidden
  }

  .filter .manu a {
    float: left;
    width: 12.41%;
    border: 1px solid #eee;
    height: 40px;
    line-height: 40px;
    position: relative;
    margin: 0 0 -1px -1px;
    color: #288ad6;
    text-align: center
  }

  .filter .manu a.check {
    border-color: #52a2e1;
    z-index: 1;
    position: relative
  }

  .filter .manu a.check:after {
    content: "";
    width: 23px;
    height: 20px;
    position: absolute;
    left: 0;
    top: 0;
    background: transparent url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAC4AAAAoCAYAAACB4MgqAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyFpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDUuNS1jMDE0IDc5LjE1MTQ4MSwgMjAxMy8wMy8xMy0xMjowOToxNSAgICAgICAgIj4gPHJkZjpSREYgeG1sbnM6cmRmPSJodHRwOi8vd3d3LnczLm9yZy8xOTk5LzAyLzIyLXJkZi1zeW50YXgtbnMjIj4gPHJkZjpEZXNjcmlwdGlvbiByZGY6YWJvdXQ9IiIgeG1sbnM6eG1wPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvIiB4bWxuczp4bXBNTT0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wL21tLyIgeG1sbnM6c3RSZWY9Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9zVHlwZS9SZXNvdXJjZVJlZiMiIHhtcDpDcmVhdG9yVG9vbD0iQWRvYmUgUGhvdG9zaG9wIENDIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDo1RDlCNUE2MjRCQjgxMUVBQTEyRkEwNENDMEQzMkE2MiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDo1RDlCNUE2MzRCQjgxMUVBQTEyRkEwNENDMEQzMkE2MiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjVEOUI1QTYwNEJCODExRUFBMTJGQTA0Q0MwRDMyQTYyIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjVEOUI1QTYxNEJCODExRUFBMTJGQTA0Q0MwRDMyQTYyIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+O8UzUAAAA0RJREFUeNrUmF1IU2EYx//vu6ObMnXT+Vmnm+wiYhFRpBWVJRFp0gfd6G4KupCQvgiKvq4iIbA06koKuiiKCIO8sCuzLxreKEL2KVZm6HTZckOd5/SclWTmcmc7m+c88LJn5z1n+51nz/s/739s981eGQYKBiaByUcFQ0EzFqCXShpNgoFKPcA52yFJslt5y41Rabw2yeYiSt1Tx7gB2qONm/laSnumH+c6h75dkCVupXR45hzXb0vz2nsusYrSsdnmNQXPtQqoK8/D8Y2OWMoc5IwfoOwkjbBSrZmq2FNMOFeag9w0AWYh6nr4GMdeSGiZ60RNwK3JHGdLs0PQgQkJl554onmw9AmMlwUhdURyfsytYhEYzmzJxiJbMiYmZdS2DuLd0Lha6E4L54rcdUR6TUzgSXT1iZJsFDrMmJRk1FGlu76OqVWORxkZKesp/azmurDgNgvHgvTwncQZcGyDA848C2RZxrUXw3B/Cqjtj0bnQrFM6W21RQsLfn5bLuor8rFrWfqs8weLM7FaTA3lN9q/ofXDqJoyy4yz05Qp6hGM5tcOC/7WM678jHCttKG6KBMm9mdu/yo7Ni22hvI7HSNo7vapYIbywS6lNrG0adheuPJsKLTYNhdaUbrEihzS6IuPB1G+NA1lNJRofuXD3c4RNdBembOdpM5tsYpCWHBixlXq235fEJUrMrA834KGigLYU02h+db3P3C93asGugempO2Qg91aSPCcqnK/6zupxRDG6U6moF9+9IduSkVTu1N/7e40gY74AfS81w/PaBA167LQ653A5aceSHLEcteUZROqAl74tdxeRPzkfEOLteZBvzq142hwVolHvjzsl7TehMVld6j4Qurpw5QeoiHF4zs0t27TfWE8t72CxqX+yxfGM7h2lf7XF+oeXPGFZo7imb5Q1+DTfKEXCYyYwKmfL/zPF+pvcSq+EKyaLGHjfJnpaMAj9oW6AVfrC3XR44ov5Ba2Ro0vnHdwgm757Qv79PKHEY+AutEpiuXR+ML5ASdfyBk7FYsvTPjiVHyhzNg+su+3oNMQ4ukLEwautS9MUI9r7wvjDq74QoddKKF0AAYJEg5e73SJeyj3w0DxU4ABAGYG7XZm8JELAAAAAElFTkSuQmCC) no-repeat left top;
    background-size: 23px 20px;
    z-index: 2
  }

  .filter .manu a img {
    max-height: 70%;
    position: absolute;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto
  }

  .filter .manu5 a {
    width: calc((100% - 5px)/5)
  }

  .filter .manu6 a {
    width: calc((100% - 6px)/6)
  }

  .filter .manu7 a {
    width: calc((100% - 7px)/7)
  }

  .filter .price {
    margin-right: 20px
  }

  .filter .price * {
    display: inline-block;
    vertical-align: top;
    padding-right: 10px;
    line-height: 40px
  }

  .filter .price a {
    color: #288ad6;
    position: relative
  }

  .filter .price a:hover {
    color: #333
  }

  .filter .price a.check {
    font-weight: bold
  }

  .filter .barpage a {
    line-height: 40px;
    display: inline-block;
    margin-right: 10px;
    color: #288ad6;
    position: relative
  }

  .filter .barpage a:hover {
    color: #333
  }

  .filter .barpage a i {
    display: inline-block;
    vertical-align: middle;
    margin-right: 2px
  }

  .filter .feature {
    position: relative;
    margin-right: 30px
  }

  .filter .property {
    position: absolute;
    top: 40px;
    right: 0;
    width: 500px;
    padding: 10px 15px 0 15px;
    border: 1px solid #eee;
    background-color: #fff;
    z-index: 2;
    flex-flow: row wrap;
    flex: 1 100%;
    display: none;
    border-radius: 4px;
    box-shadow: 0 10px 10px 0 rgba(0, 0, 0, .1)
  }

  .filter .property:before,
  .filter .property:after {
    content: '';
    width: 0;
    height: 0;
    position: absolute;
    bottom: 100%;
    left: 45%;
    border-bottom: 10px solid #d9d9d9;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent
  }

  .filter .property:before,
  .filter .property:after {
    left: 90%
  }

  .filter .property:after {
    border-width: 9px;
    border-bottom-color: #fff;
    margin-left: 1px
  }

  .filter .property div {
    float: left;
    width: 50%;
    margin-bottom: 10px;
    border-bottom: 1px solid #eee
  }

  .filter .property div>* {
    display: block;
    margin-bottom: 10px
  }

  .filter .property div a {
    color: #333
  }

  .filter .property a.morefeature {
    position: relative;
    color: #288ad6;
    display: block;
    padding-bottom: 10px;
    text-align: center;
    margin: auto
  }

  .filter .property a.morefeature:after {
    content: '';
    width: 0;
    height: 0;
    border-top: 6px solid #288ad6;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    display: inline-block;
    vertical-align: middle;
    margin-left: 5px
  }

  .filter .property .doit {
    display: block;
    width: 100%
  }

  .filter .property .doit button {
    border: none;
    width: 100%;
    margin-bottom: 10px
  }

  .filter .property .doit .noresult {
    display: block;
    background: #fafafa;
    color: #999;
    height: 40px;
    line-height: 40px;
    border-radius: 4px;
    text-align: center;
    border: 1px solid #eee
  }

  .filter .property .doit .viewresult {
    display: block;
    background: #288ad6;
    color: #fff;
    height: 40px;
    line-height: 40px;
    border-radius: 4px;
    text-align: center;
    cursor: pointer
  }

  .filter .property .doit .clearprop {
    display: block;
    margin: -10px auto 0 auto;
    color: #c10017;
    padding: 0 20px;
    height: 40px;
    line-height: 40px;
    background: none;
    cursor: pointer
  }

  .filter .property .cslder {
    width: 100%;
    position: absolute;
    left: 0;
    top: 0;
    height: 100%;
    background: rgba(255, 255, 255, .6)
  }

  .filter .feature.expand .property {
    display: flex !important
  }

  .filter .feature.child {
    margin-right: 15px
  }

  .filter .feature.child .property {
    width: 200px
  }

  .filter .feature.child .property div {
    width: 100%;
    padding-top: 7px
  }

  .filter .feature.child .property:before,
  .filter .feature.child .property:after {
    left: 77%
  }

  .filter .sort {
    position: relative;
    z-index: 2
  }

  .filter .sort div {
    position: absolute;
    top: 40px;
    right: 0;
    width: 180px;
    padding: 12px 10px 2px 10px;
    background-color: #fff;
    border: 1px solid #eee;
    border-radius: 4px;
    box-shadow: 0 10px 10px 0 rgba(0, 0, 0, .1);
    display: none
  }

  .filter .sort div:before,
  .filter .sort div:after {
    content: '';
    width: 0;
    height: 0;
    position: absolute;
    bottom: 100%;
    left: 45%;
    border-bottom: 10px solid #d9d9d9;
    border-left: 10px solid transparent;
    border-right: 10px solid transparent
  }

  .filter .sort div:before,
  .filter .sort div:after {
    left: 75%
  }

  .filter .sort div:after {
    border-width: 9px;
    border-bottom-color: #fff;
    margin-left: 1px
  }

  .filter .sort div a {
    display: block;
    padding: 0 0 10px 21px;
    color: #333
  }

  .filter .sort div a:hover {
    color: #288ad6
  }

  .filter .sort div a i {
    display: none
  }

  .filter .sort div a.check {
    padding-left: 0
  }

  .filter .sort div a.check i {
    margin: -2px 5px 0 0;
    display: inline-block
  }

  .choosedfilter {
    display: block;
    overflow: hidden;
    background: #fff;
    margin: -10px 0 15px 0;
    clear: both
  }

  .choosedfilter a {
    display: inline-block;
    vertical-align: text-bottom;
    padding: 6px;
    background: #288ad6;
    font-size: 12px;
    color: #fff;
    border-radius: 4px;
    margin-right: 5px
  }

  .choosedfilter a h2 {
    display: inline;
    color: #fff;
    font-size: 12px
  }

  .choosedfilter a.reset {
    background: #c10017
  }

  .choosedfilter .icontgdd-clearfil {
    background-position: -249px -31px;
    width: 10px;
    height: 10px;
    margin: -1px 0 0 3px;
    vertical-align: middle
  }

  .choosedfilter .watching {
    float: right;
    white-space: nowrap;
    line-height: 30px
  }

  .choosedfilter .watching h1 {
    display: inline;
    font-weight: bold;
    text-transform: uppercase
  }

  .bannermanu {
    margin-bottom: 10px
  }

  .bannermanu a {
    pointer-events: none;
    cursor: default
  }

  .bannermanu img {
    display: block;
    max-width: 100%
  }

  .guidebanner {
    display: block;
    margin: 10px 0 15px 0;
    height: 265px;
    overflow: hidden;
    position: relative
  }

  .guidebanner .gb-title {
    padding: 20px 10px;
    border: solid 1px #eee
  }

  .guidebanner .gb-title h3 {
    text-transform: uppercase;
    font-weight: bold;
    display: inline-block
  }

  .guidebanner .gb-title a {
    color: #288ad6;
    float: right
  }

  .guidebanner .gb-title a:after {
    content: '';
    width: 0;
    height: 0;
    border-top: 6px solid #288ad6;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    display: inline-block;
    vertical-align: middle;
    margin-left: 10px
  }

  .guidebanner .gb-title a i {
    font-style: normal;
    display: none
  }

  .guidebanner .gb-title a b {
    font-weight: normal
  }

  .guidebanner .gb-img {
    position: relative
  }

  .guidebanner .gb-img img {
    display: block;
    max-width: 100%
  }

  .guidebanner .gb-img a:last-child {
    display: block;
    overflow: hidden;
    width: 200px;
    height: 40px;
    position: absolute;
    bottom: 22px;
    left: 0;
    right: 0;
    margin: auto
  }

  .guidebanner .gb-more {
    display: block;
    position: absolute;
    top: 255px;
    left: 0;
    right: 0;
    z-index: 1;
    text-align: center
  }

  .guidebanner .gb-more:before {
    height: 55px;
    margin-top: -45px;
    content: -webkit-gradient(linear, 0% 100%, 0% 0%, from(#fff), color-stop(.2, #fff), to(rgba(255, 255, 255, 0)));
    display: block
  }

  .guidebanner .gb-more a {
    color: #288ad6;
    display: block;
    margin-top: -18px
  }

  .guidebanner .gb-more a:after {
    content: '';
    width: 0;
    height: 0;
    border-top: 6px solid #288ad6;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    display: inline-block;
    vertical-align: middle;
    margin-left: 10px
  }

  .guidebanner.full {
    height: auto
  }

  .guidebanner.full .gb-title a b {
    display: none
  }

  .guidebanner.full .gb-title a i {
    display: inline-block
  }

  .guidebanner.full .gb-more {
    display: none
  }

  h1.h1 {
    display: block;
    font-weight: bold;
    line-height: 50px;
    font-size: 16px;
    text-transform: uppercase;
    background-color: #fff;
    border-top: 1px solid #eee;
    clear: both
  }

  h3.title {
    display: block;
    clear: both;
    padding: 15px 0;
    font-size: 16px;
    border-top: 1px solid #eee
  }

  .need {
    white-space: nowrap;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #eee
  }

  .need a {
    display: inline-block;
    vertical-align: top;
    width: 20%;
    position: relative
  }

  .need a:not(:last-child):after {
    content: '';
    width: 2px;
    height: 50%;
    background-color: #eee;
    right: 0;
    top: 0;
    bottom: 0;
    margin: auto;
    position: absolute
  }

  .need a img {
    display: block;
    height: 130px;
    margin: auto
  }

  .homeproduct {
    clear: both;
    display: block;
    background: #fff;
    display: -webkit-box;
    display: -moz-box;
    display: -ms-flexbox;
    display: -webkit-flex;
    display: flex;
    -webkit-flex-flow: row wrap;
    flex-flow: row wrap;
    flex: 1 100%;
    border-top: 1px solid #eee;
    border-left: 1px solid #eee;
    margin-bottom: 15px
  }

  .homeproduct .item {
    float: left;
    position: relative;
    width: 19.91%;
    overflow: hidden;
    border-right: 1px solid #eee;
    border-bottom: 1px solid #eee
  }

  .homeproduct .item a {
    display: block;
    overflow: hidden;
    background: #fff;
    padding: 10px 0
  }

  .homeproduct .item a:hover h3 {
    color: #288ad6
  }

  .homeproduct .item img {
    display: block;
    width: 180px;
    height: 180px;
    margin: 15px auto
  }

  .homeproduct .item a img {
    -webkit-transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out
  }

  .homeproduct .item a:hover>img {
    margin: 5px auto 25px
  }

  .homeproduct .item img.icon-imgNew {
    width: 50px;
    height: auto;
    position: absolute;
    left: 162px;
    top: 90px
  }

  .homeproduct .item h3 {
    display: block;
    line-height: 1.3em;
    font-size: 14px;
    margin: 0 10px;
    color: #333;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    overflow: hidden
  }

  .homeproduct .item h6 {
    font-size: 12px;
    color: #d0021b;
    margin: 0 9px 0
  }

  .homeproduct .item .price {
    display: block;
    overflow: hidden;
    padding: 5px 10px 0 10px
  }

  .homeproduct .item strong {
    display: inline-block;
    vertical-align: middle;
    overflow: hidden;
    font-size: 14px;
    color: #e10c00;
    line-height: 15px
  }

  .homeproduct .item span {
    display: inline-block;
    vertical-align: middle;
    font-size: 12px;
    text-decoration: line-through;
    margin-left: 5px;
    color: #222
  }

  .homeproduct .item label {
    display: inline-block;
    position: absolute;
    top: 187px;
    left: 10px;
    font-size: 11px;
    color: #fff;
    font-weight: 600;
    background: #3fb846;
    border-radius: 2px;
    padding: 0 5px;
    height: 18px
  }

  .homeproduct .item label.installment {
    background: #f28902
  }

  .homeproduct .item label.preorder {
    background: #e91e63
  }

  .homeproduct .item label.new {
    background: #1191f8
  }

  .homeproduct .item label.cheap {
    background: #3fb846
  }

  .homeproduct .item label.per {
    background: #ee170b
  }

  .homeproduct .item label.discount {
    background-image: linear-gradient(-90deg, #ec1f1f 0%, #ff9c00 100%);
    border-radius: 10px;
    padding: 1px 10px 2px 0
  }

  .homeproduct .item label.discount:before {
    content: ' ';
    display: inline-block;
    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABAAAAAaCAYAAAC+aNwHAAAABGdBTUEAALGPC/xhBQAAAVpJREFUOBGVki1LBFEUhueuH0FQTAuimxVE2KZBgxj8AxaLglj8AYLJZLOYtFpFwWQ2iMUkiyBqNCloEFEQYXzuzl7mzP0Y7z3w7j0f73PuDDtZFhl5njfRI5qJREobUB+6RL9otJxEZkD7SMd1JFLagFa6aPGzW04iMpgp9CEWzEZghQVoGN0L+I28kbLgVMA6PUmBty1YlxtRCzAuIv132THx7wKIcfRik9R3IbjfDDANkp+hpumJ8535pqhN+mySDMMhSo1OdwHUWiqJ/wu19c3tXsGRFOvm9k4SVpiPzLsr6mWKlmmIc568uEU0SW/QglLqp9q2KhYfe57slZ7vsiqNqYHs70F/XEtVZ6DCOIfs2AnY3TbknkWfUyvXGehgvhULHshHAla3jbkl4E/yaddV0wHYEgtWa6z+EfBFb8GB31HTBRxC3+gKDdRY/SOgSfSExvwOt/sHwv9i4NYIgYYAAAAASUVORK5CYII=');
    background-size: 50% 50%;
    width: 20px;
    height: 20px;
    background-repeat: no-repeat;
    background-position: center center;
    background-color: #f13500;
    border-radius: 50%;
    vertical-align: middle;
    position: relative;
    top: -1px;
    margin-right: 5px
  }

  .homeproduct .item label.discount2020 {
    background-image: linear-gradient(-90deg, #ec1f1f 0%, #ff9c00 100%);
    border-radius: 10px;
    padding: 1px 10px 2px 0
  }

  .homeproduct .item label.discount2020:before {
    content: ' ';
    display: inline-block;
    background-size: 100%;
    width: 44px;
    height: 20px;
    background-repeat: no-repeat;
    background-position: center center;
    vertical-align: middle;
    position: relative;
    top: -1px;
    margin-right: 5px;
    background-image: url('data:image/png;base64,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')
  }

  .homeproduct .item .promo {
    display: block;
    padding: 5px 10px 0 10px;
    margin: 0
  }

  .homeproduct .item .promo:after {
    content: "";
    display: table;
    clear: both
  }

  .homeproduct .item .promo img {
    display: block;
    width: 35px;
    height: 35px;
    float: left;
    margin: 0
  }

  .homeproduct .item .promo p {
    font-size: 12px;
    color: #333;
    line-height: 1.4;
    width: 165px;
    float: left;
    margin-left: 10px;
    white-space: normal;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden
  }

  .homeproduct .item .promo.noimage p {
    margin-left: 0;
    width: auto
  }

  .homeproduct .item .props {
    padding: 5px 10px 0 10px;
    margin: 0;
    color: #777
  }

  .homeproduct .item .props span {
    font-size: 11px;
    margin: 0 5px 5px 0;
    text-decoration: none;
    text-transform: uppercase;
    color: #777;
    line-height: 22px;
    height: 20px;
    padding: 0 5px;
    border-radius: 2px;
    position: relative
  }

  .homeproduct .item .props span:first-child {
    padding-left: 0
  }

  .homeproduct .item .props span:nth-child(2):after {
    display: block;
    content: " ";
    width: 1px;
    height: 14px;
    position: absolute;
    left: -5px;
    bottom: 2px;
    margin-top: -8px;
    border-right: 1px solid #dfdfdf
  }

  .homeproduct .item .props span.lower {
    text-transform: none
  }

  .homeproduct li.feature {
    width: 39.917%
  }

  .homeproduct li.feature a {
    padding: 0
  }

  .homeproduct li.feature a:hover img {
    margin: 0 0 14px
  }

  .homeproduct li.feature label {
    left: auto;
    bottom: 33px;
    top: 235px !important;
    right: 15px
  }

  .homeproduct li.feature .fleft {
    width: 200px;
    text-align: center;
    float: left;
    padding-top: 10px
  }

  .homeproduct li.feature .fleft img {
    width: 200px;
    height: 200px
  }

  .homeproduct li.feature .fright {
    width: 55%;
    float: right;
    padding-top: 10px
  }

  .homeproduct li.feature .notRepresent {
    width: 55%;
    float: right;
    padding-top: 10px
  }

  .homeproduct li.feature .notRepresentLaptop {
    margin: 10px 0 0 10px
  }

  .homeproduct li.feature .fright>* {
    margin: 0;
    padding: 3px 0
  }

  .homeproduct li.feature .fright h3 {
    font-size: 18px;
    font-weight: bold
  }

  .homeproduct li.feature .fright strong {
    font-size: 16px
  }

  .homeproduct li.feature .promotion {
    border: 1px solid #eee;
    border-radius: 3px;
    padding: 5px;
    position: relative;
    padding: 20px 10px 5px 10px;
    margin-top: 15px;
    margin-right: 10px;
    clear: both
  }

  .homeproduct li.feature .promotion span {
    margin-left: 0;
    text-decoration: none
  }

  .homeproduct li.feature .promotion span.blue {
    color: #288ad6
  }

  .homeproduct li.feature .promotion .plabel {
    position: absolute;
    left: 5px;
    top: -10px;
    padding: 0 10px;
    border-radius: 10px;
    background: #ed142f;
    color: #fff;
    height: 24px;
    line-height: 24px
  }

  .homeproduct li.feature .promotion .plabel i {
    background-image: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACAAAAAeCAYAAABNChwpAAAABGdBTUEAALGPC/xhBQAAAbpJREFUSA3tVj1Lw1AUTaR1KqKD4iQo1FXEwa2Dg5Zujg6Z6uDmb+hP6OzoIl2cFJxddNLVDxQcuxSqLm0hnhPuJc/4rHlpiUsuHO7HO+fex0vyWs/7w8IwrAPXQB94ANrAYlLGmqyRQy419STPKUeDJmCzLopb2owxwJrNmspz8uhUAd6l4wD+AniWnK4HVAWM1cghlxoae1SchpMMUY1qsZbUysjPtAh/L9AS18rCbWkRvsaazUq2otQGxtoyY9/3h2gWIJwH9oANQO0KQUCOFCKNxGYv5UfeR8Obb5U4mUW4GafeK+Ku5Avw68Yaw0egJ7Ul+FWJ6e4A6ya4gdAg5h6aj6CP6W857WAFc+aiWTwBsU5Ow/mCd3ToTNahaNAAXgSNrH3Md+AJTS4dGlXB1cHUUZ/WqKPeMzeQVjxVXuZHMK1d8CvgNXkK7EtT92tThCndh/DO4YMSbq5PvEgjFTPXeJyHZhvrx8JpQ3c7jq9r0Gk44qxJHgG/5QMB40w2yQYyDUyKig0UJ1CcQHECxQmY/wmjWxI/FifJ6/KXfM2oH0G3a+Spwx8bgPIwtTom7iAknO3f34EvJBBbitUXLJcAAAAASUVORK5CYII=');
    background-size: 16px 15px;
    width: 16px;
    height: 15px;
    display: inline-block;
    position: relative;
    top: 2px;
    margin-right: 3px
  }

  .homeproduct li.feature .fright .button {
    margin-top: 10px
  }

  .homeproduct li.feature a.featurelaptop .promotion {
    margin-left: 10px
  }

  .homeproduct li.feature a.featurelaptop .promotion span {
    margin-bottom: 5px;
    display: block
  }

  .homeproduct li.feature a.featurelaptop .promotion span img {
    display: inline-block;
    width: 35px;
    margin: 0;
    vertical-align: middle;
    margin-right: 5px
  }

  .homeproduct li.feature a.featurelaptop .promotion span.noimg:before {
    content: "•";
    color: #d4d4d4;
    display: inline-block;
    vertical-align: middle;
    font-size: 15px;
    margin-right: 6px
  }

  .homeproduct li.feature a.featurelaptop .ratingresult {
    padding-top: 5px
  }

  .homeproduct li.feature a.featurelaptop .button {
    margin-left: 10px;
    margin-top: 10px
  }

  .homeproduct .ratingresult {
    padding: 5px 10px
  }

  .homeproduct .ratingresult span {
    color: #777;
    text-decoration: none;
    position: relative;
    top: 1px
  }

  .homeproduct .item .laptop img {
    margin: 45px auto;
    height: auto;
    -webkit-transition: all .2s ease-in-out;
    -moz-transition: all .2s ease-in-out;
    -o-transition: all .2s ease-in-out;
    transition: all .2s ease-in-out
  }

  .homeproduct .item .laptop:hover>img {
    margin: 38px auto 52px
  }

  .homeproduct .item .laptop h3 {
    word-break: break-all
  }

  .homeproduct li img.icon-imgNew.cate42 {
    top: 140px
  }

  .homeproduct.filter-cate li .promo p {
    width: 195px
  }

  .filter-cate li.item {
    width: 24.9%;
    position: relative;
    padding-bottom: 40px
  }

  .filter-cate li.nopromo {
    height: 410px
  }

  .filter-cate li:hover h3 {
    color: #288ad6
  }

  .filter-cate li.item img {
    height: 200px;
    width: auto
  }

  .filter-cate li.item .ratingresult {
    padding: 0 10px 2px 10px !important
  }

  .filter-cate li.item label {
    top: 207px !important
  }

  .filter-cate li.item .promotion {
    margin: 5px 0;
    border-bottom: 1px dotted #eee;
    padding-bottom: 5px
  }

  .filter-cate li.item .promotion span {
    color: #333
  }

  .filter-cate li.item .promotion span:before {
    content: '•';
    color: #999;
    display: inline-block;
    vertical-align: middle;
    margin-right: 5px;
    font-size: 16px
  }

  .filter-cate li.item .bginfo {
    position: relative;
    left: auto;
    bottom: auto;
    right: auto;
    height: auto;
    opacity: 1;
    padding-bottom: 0;
    margin-top: 10px;
    margin-bottom: 5px
  }

  .filter-cate li.item .bginfo span {
    display: block;
    color: #666;
    padding: 3px 0;
    text-decoration: none;
    line-height: normal;
    margin-left: 10px
  }

  .filter-cate li.item .btnbuy {
    display: block;
    overflow: hidden;
    text-align: center;
    position: absolute;
    bottom: 0;
    left: 0;
    right: 0;
    z-index: 1;
    margin-bottom: 10px
  }

  .filter-cate li.item .btn_buynow {
    display: inline-block;
    text-align: center;
    overflow: hidden;
    padding: 5px 0;
    width: 110px;
    margin: 0 5px;
    margin-left: 0;
    cursor: pointer;
    font-size: 12px;
    color: #f76b1c;
    text-transform: uppercase;
    border: 1px solid #f76b1c;
    border-radius: 3px;
    background: #fff;
    transition: all .3s ease
  }

  .filter-cate li.item:hover .btn_buynow {
    background: -webkit-gradient(linear, 0% 0%, 0% 100%, from(#f76b1c), to(#f89406));
    background: -webkit-linear-gradient(top, #f89406, #f76b1c);
    background: -moz-linear-gradient(top, #f89406, #f76b1c);
    background: -ms-linear-gradient(top, #f89406, #f76b1c);
    background: -o-linear-gradient(top, #f89406, #f76b1c);
    color: #fff
  }

  .filter-cate li.item .btn_other {
    width: auto;
    padding: 5px 20px;
    float: none
  }

  .filter-cate li.item .btn_buyins {
    display: inline-block;
    text-align: center;
    overflow: hidden;
    padding: 5px 0;
    width: 110px;
    cursor: pointer;
    font-size: 12px;
    color: #288ad6;
    text-transform: uppercase;
    border: 1px solid #288ad6;
    border-radius: 3px;
    background: #fff;
    transition: all .3s ease
  }

  .filter-cate li.item:hover .btn_buyins {
    background: #288ad6;
    color: #fff
  }

  .filter-cate li.item.four {
    clear: both
  }

  .filter-cate li.item .price {
    padding: 5px 10px
  }

  .filter-cate li.item .promo {
    border-bottom: 1px dashed #ccc;
    margin: 5px 10px 0 10px;
    padding: 0 0 10px 0
  }

  .filter-cate li.item img.icon-imgNew {
    top: 157px;
    left: 193px
  }

  .filter-cate li.item img.icon-imgNew.cate522 {
    top: 165px;
    left: 204px
  }

  .filter-cate li.item img.icon-imgNew.cate44 {
    top: 117px;
    left: 220px;
    width: 50px
  }

  .filter-cate li.item img.icon-imgNew.cate44.memory {
    top: 151px;
    left: 220px;
    width: 60px
  }

  .filter-cate li.item img.icon-imgNew.cate42 {
    top: 164px;
    left: 197px;
    width: 47px
  }

  .filter-cate li.item img.icon-imgNew.cate7077 {
    left: 212px
  }

  .filter-cate li.olol p.olol {
    color: #f01;
    font-size: 12px;
    margin: 10px 10px -5px 10px
  }

  .filter-cate.laptop li {
    padding-bottom: 0
  }

  .filter-cate.laptopzoom li {
    padding-top: 25px
  }

  .cate42 .filter .property div:nth-last-child(-n+4) {
    border-bottom: 0
  }

  .cate44 .tabslink {
    margin: 10px 0;
    border-bottom: 1px solid #d9d9d9;
    display: inline-block;
    vertical-align: top;
    width: 100%
  }

  .cate44 .tabslink a {
    height: 45px;
    line-height: 45px;
    text-transform: uppercase;
    text-align: center;
    color: #288ad6;
    font-size: 16px;
    width: 270px;
    display: inline-block;
    vertical-align: top;
    border: 1px solid #d9d9d9;
    margin: 0 -5px -1px 0;
    background-color: #f4f4f4
  }

  .cate44 .tabslink a:hover {
    color: #f5a623
  }

  .cate44 .tabslink a.active {
    font-weight: bold;
    background-color: #fff;
    position: relative;
    border-bottom-color: #fff
  }

  .cate44 .tabslink a.active:before {
    content: "";
    border-top: 2px solid #288ad6;
    width: 100%;
    position: absolute;
    left: 0;
    top: 0
  }

  .cate44 .tabslink a:first-child {
    border-top-left-radius: 4px
  }

  .cate44 .tabslink a:last-child {
    border-top-right-radius: 4px
  }

  .cate44 .filter-cate .item img {
    width: 250px;
    height: auto;
    margin: 30px auto 25px
  }

  .cate44 .filter-cate .item a:hover>img {
    margin: 20px auto 35px auto
  }

  .cate44 .img-title {
    display: block;
    max-width: 100%;
    margin-bottom: -1px
  }

  .cate44 .homeproduct .item .promo img {
    width: 35px;
    height: auto;
    margin: 0
  }

  .cate44 .homeproduct .item.feature label {
    top: 235px !important
  }

  .cate44 .filter .property div:nth-last-child(-n+3) {
    border-bottom: 0
  }

  .cate44 .filter.laptop {
    padding: 0
  }

  .cate44 .filter.laptop h1 {
    border-top: none;
    display: inline-block;
    vertical-align: top
  }

  #owl-laptop {
    border: 3px solid #ba0953;
    height: 385px;
    overflow: hidden;
    width: calc(100% - 6px) !important;
    margin-bottom: 4px
  }

  #owl-laptop .item .props {
    padding-top: 0;
    margin-top: -5px
  }

  #owl-laptop .owl-item .item {
    width: auto;
    float: none;
    border-bottom: none
  }

  #owl-laptop .owl-buttons {
    position: absolute;
    top: 24%;
    height: 0;
    width: 100%;
    display: block
  }

  #owl-laptop .owl-buttons div {
    position: absolute;
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
    top: 63px
  }

  #owl-laptop .owl-next {
    right: 0
  }

  #owl-laptop .owl-prev {
    left: 0
  }

  .emptystate {
    border: none
  }

  .emptystate li {
    width: 100%;
    height: auto;
    display: block;
    text-align: center;
    padding: 30px 0 20px 0;
    line-height: 1.5;
    float: none;
    border: none
  }

  .emptystate li a {
    color: #288ad6;
    padding: 0;
    margin-top: 5px
  }

  .viewmore {
    display: block;
    overflow: hidden;
    position: relative;
    line-height: 40px;
    font-size: 14px;
    color: #288ad6;
    border: 1px solid #eee;
    text-align: center;
    border-radius: 3px;
    margin: 10px auto 20px;
    width: 240px
  }

  .viewmore:after {
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

  .viewmore:hover {
    background: #288ad6;
    border-color: #288ad6;
    color: #fff
  }

  .viewmore:hover:after {
    border-top: 6px solid #fff
  }

  .viewmore.loading {
    height: 30px;
    padding-top: 10px
  }

  .viewmore.loading:after,
  .viewmore.loading:hover {
    background-color: #fff
  }

  .viewmore.loading:after,
  .viewmore.loading:hover:after {
    display: none
  }

  .catetag {
    display: block;
    overflow: hidden;
    background: #fff;
    padding: 14px 0;
    border-bottom: none;
    text-align: left;
    white-space: nowrap;
    max-width: 1200px;
    margin: 10px auto
  }

  .catetag div {
    display: inline-block;
    overflow: hidden;
    vertical-align: top;
    margin: 0
  }

  .catetag a {
    display: inline-block;
    vertical-align: top;
    padding: 0 15px 0 0;
    font-size: 12px;
    color: #288ad6;
    white-space: nowrap;
    text-overflow: ellipsis;
    overflow: hidden;
    margin: 0 10px 0 0;
    text-align: left
  }

  .plc {
    background: #f1faf3;
    overflow: hidden;
    font-size: 14px;
    color: #333;
    line-height: 18px;
    border-top: 1px solid #d0dfd2;
    border-bottom: 1px solid #d0dfd2
  }

  .plc ul {
    height: 58px;
    max-width: 1200px;
    width: 100%;
    min-width: 980px;
    margin: 0 auto;
    position: relative
  }

  .plc li {
    width: 205px;
    display: inline-block;
    box-sizing: border-box;
    padding: 0;
    border-right: solid 1px #d0dfd2;
    margin: 12px 22px 12px 0
  }

  .plc li:nth-child(4n+2) {
    width: 240px
  }

  .plc li:last-child {
    width: 240px;
    margin-right: 0;
    border: none
  }

  .plc li:last-child span {
    padding-right: 0
  }

  .plc li span {
    text-align: left;
    display: block;
    padding-right: 18px
  }

  .plc li span a {
    color: #288ad6
  }

  .plc li i {
    display: inline-block;
    float: left;
    margin-right: 15px
  }

  .plc i.icGh {
    background: url('data:image/png;base64,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');
    width: 35px;
    height: 34px;
    background-size: 35px 28px;
    background-repeat: no-repeat;
    background-position: 0 4px
  }

  .plc i.icTt {
    background: url('data:image/png;base64,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');
    width: 29px;
    height: 31px;
    background-size: 29px 31px
  }

  .plc i.icTn {
    background: url('data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAD4AAAA+CAYAAABzwahEAAAABGdBTUEAALGPC/xhBQAABNNJREFUaAXtm21MHEUYx5+ZW17vDC9GWgu1SvECZ5APNpRLaLRRYhqsiaRJm+oX6+sHocaoiVRNI9TaePVD/YImfiWRJprAB5FCgrkWiAK1nBSt5SWVeijpNRy313vbGWeX3LZwR5e7vb3D7U5y2d15dp6Z3/PfmdzePYOAleP0OO490f82EHqIIqgBCtli/WYpCOMbbGw/Y87UNtT603AqxoUk6Lb+Xgq04YHCElJRuhNncVmp8J0yH17eC1PXpkgwFASM4PXhjy58o9Y5qmuvf4cSerqxrhFefOYwc4zV+tSkvWf5JnzWeZL8tTgfAI57bOSDwTk1HWHx8S4p3EI2M7QIWHxfEby87wimlOZDRNivBlpsy4lzuqK0HK9V2nfLB2EhrNa/qvbmXDNkc7eXm0fLKlb8IfK4KsesMScuZNyaOX3muzMwNJmSNUTV+MS1pvmFt6C2slbyw2EOALERU8hV5VgCX+PB6/dK0NbtVqjaYVtjTe9l3y8/wsD4gAyeyt5ZCFeXiBCRKmwM+tDeg6uNab4673Ky6bYynlR3vTmX8FRTxvFngMcJiq6rDMV1LW8cOEPxOEHRddU9q3jMF5hMyTx6ZQwu/nkRlvxL8hCW/csQCofAcfa0XCeeUIAnd7fVf7+qUvkiggAmc3O4jsH3Bxc2BXjnQCd0D/UAQghys3NkBMyuw5EQTM7+JtdJdgplFFCpXLmBE0KI6OtAMBhpsZ98qjbj4G6PG7qHe9grYg0cbWqB/Jx8JQwmnFSiR6X7Zbtr1sXe6U8VkEjkVMbn+NXr09Kz+xz7IWQD0DJEMifVj1SzF68q8UGyZxw8GA5IDDlZtx/xZKA22kacKpSi/Iw/6nMLc9KYv+r5etX83ihIovcteBYYODFnHDwQWlE8GA5KvzAkCpLo/YJAxEXUlHHw6MBbmprBWmaNXmp2dHQ5YOzKOGR8jmtGqODYAFcIkO7MhuK6k1QByFBcIUC6MxuK605SBSBDcYUA6c5sKK47SRWADMUVAqQ7s6G47iRVADIUVwiQ7syG4rqTVAHIUFwhQLozG4rrTlIFoHtW8Zi/kDA2SbGadc9A32ifQtzUm9033OqdJOEhBrzQXAC2h21waXpC+iTh83/RJAZcHPWxl1phfvE6y4fXJoH2zsicHeyCX69eurMqLedxwU3IBDtKHkpoAHzAB0ts78j6BcHW4i0xWz8seZb1m2ho4RDCS/wtvkBNH4QSaP7yKPgD/ru6adjVAK/sO3LXe9JlZDsU6Ogf137f6wvw2MK2QiRTxG0drzW+Cv/e/Gf95izxZJf1iXXt58b6YYyle2ld5hfnpS6Y4uBg0E87vv2cvrH/TfRg8dak+rbb7Em1izZyTjijp2k5SilTde17Wpnyn7AdPiZznkXITmOiBEvgQ3zQj987+C6UbyvXHLqjuwMmpl1eaXEb+dD5ad2JPb1A0AF/wFfjpyg9KUgMk2UpbmOHKnOeGYosRZqDS99TMAjyqj5yzDnOehU/aS272+vrgYDTNeOCyu2VmvbtD/Iw8/c0Yf1dTjg7MNUjE7d4/tB27jzza68ur4YitrFOiyIQAabmpohn2YPZJrumjIOLkPYvni2mPO9geVjPU0Lu1wKcpXgJCNBlluPWPvLxha7/AMP7bH2rqHbgAAAAAElFTkSuQmCC');
    width: 31px;
    height: 31px;
    background-size: 31px 31px
  }

  .plc i.icLd {
    background: url('data:image/png;base64,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');
    width: 32px;
    height: 32px;
    background-size: 32px 32px
  }

  .plc i.icHt {
    background: url('data:image/png;base64,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');
    width: 30px;
    height: 30px;
    background-size: 30px 30px
  }

  .cslder {
    display: block;
    text-align: center;
    height: 20px;
    position: relative;
    display: none;
    clear: both
  }

  .cslder .cswrap {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%)
  }

  .csdot {
    width: 5px;
    height: 5px;
    border: 1px solid #288ad6;
    background: #288ad6;
    border-radius: 50%;
    float: left;
    margin: 0 2px;
    -webkit-transform: scale(0);
    transform: scale(0);
    -webkit-animation: fx 1000ms ease infinite 0ms;
    animation: fx 1000ms ease infinite 0ms
  }

  .csdot:nth-child(2) {
    -webkit-animation: fx 1000ms ease infinite 300ms;
    animation: fx 1000ms ease infinite 300ms
  }

  .csdot:nth-child(3) {
    -webkit-animation: fx 1000ms ease infinite 600ms;
    animation: fx 1000ms ease infinite 600ms
  }

  .csslder {
    display: block;
    text-align: center;
    height: 20px;
    position: relative;
    clear: both
  }

  .csslder .csswrap {
    position: absolute;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%)
  }

  .cssdot {
    width: 10px;
    height: 10px;
    border: 1px solid #288ad6;
    background: #288ad6;
    border-radius: 50%;
    float: left;
    margin: 0 5px;
    -webkit-transform: scale(0);
    transform: scale(0);
    -webkit-animation: fx 1000ms ease infinite 0ms;
    animation: fx 1000ms ease infinite 0ms
  }

  .cssdot:nth-child(2) {
    -webkit-animation: fx 1000ms ease infinite 300ms;
    animation: fx 1000ms ease infinite 300ms
  }

  .cssdot:nth-child(3) {
    -webkit-animation: fx 1000ms ease infinite 600ms;
    animation: fx 1000ms ease infinite 600ms
  }

  .loadingcover {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background-color: rgba(255, 255, 255, .75);
    display: none;
    z-index: 2
  }

  .loadingcover .csslder {
    top: 50%
  }

  @-webkit-keyframes fx {
    50% {
      -webkit-transform: scale(1);
      transform: scale(1);
      opacity: 1
    }

    100% {
      opacity: 0
    }
  }

  @keyframes fx {
    50% {
      -webkit-transform: scale(1);
      transform: scale(1);
      opacity: 1
    }

    100% {
      opacity: 0
    }
  }

  .blockLaptopGuide {
    background: #fff;
    margin-bottom: 10px
  }

  .blockLaptopGuide .question.news,
  .blockLaptopGuide .question.guideline {
    display: none
  }

  .blockLaptopGuide .question span {
    font-size: 12px;
    color: #999;
    white-space: nowrap;
    font-weight: 300;
    height: 16px;
    line-height: 1;
    position: relative;
    top: -1px;
    display: inline-block;
    padding-top: 5px
  }

  .blockLaptopGuide .question .laptopvideo span {
    padding-top: 10px;
    font-size: 13px
  }

  .blockLaptopGuide .question span.morecom {
    color: #f89406
  }

  .blockLaptopGuide .question span.morecom,
  .blockLaptopGuide .question span.lesscom {
    top: 2px
  }

  .blockLaptopGuide .question.laptop-info {
    padding-left: 0
  }

  .blockLaptopGuide .bm-question {
    float: none;
    width: 100%;
    padding-top: 10px;
    display: inline-block;
    background: #fff
  }

  .blockLaptopGuide .bm-question a.filter-Laptop.active {
    border-bottom: 2px solid #4a90e2;
    font-weight: bold
  }

  .blockLaptopGuide .bm-question a.filter-Laptop {
    margin-right: 50px;
    cursor: pointer;
    padding-bottom: 12px
  }

  .blockLaptopGuide .question {
    border-top: 1px solid #ddd;
    margin-top: 10px;
    background: #fff;
    height: 328px;
    padding: 10px;
    padding-left: 0;
    clear: both
  }

  .blockLaptopGuide .leftQuesttion {
    width: 35%;
    float: left;
    display: inline-block;
    margin-right: 2%
  }

  .blockLaptopGuide .leftQuesttion.laptopvideo {
    width: 58%;
    padding-top: 10px;
    position: relative
  }

  .blockLaptopGuide .leftQuesttion.laptopvideo a {
    padding: 0
  }

  .blockLaptopGuide .leftQuesttion.laptopvideo img {
    max-width: 100%;
    height: auto
  }

  .leftQuesttion.laptopvideo img.iconyt {
    position: absolute;
    width: auto;
    margin: auto;
    left: 0;
    right: 0;
    top: 0;
    bottom: 0
  }

  .blockLaptopGuide .rightquestion.laptopvideo {
    width: 38%
  }

  .rightquestion.laptopvideo a {
    height: 80px;
    border: none;
    position: relative
  }

  .rightquestion.laptopvideo a img.iconyt {
    position: absolute;
    width: 25px;
    left: 54px;
    top: 42px
  }

  .rightquestion.laptopvideo a img {
    width: 140px
  }

  .leftQuesttion a {
    display: block;
    overflow: hidden;
    padding: 10px 0;
    position: relative
  }

  .leftQuesttion a img {
    width: 100%;
    margin-bottom: 5px
  }

  .leftQuesttion a h3 {
    display: block;
    line-height: 1.3em;
    color: #333;
    font-size: 16px;
    font-weight: 600;
    display: -webkit-box;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    overflow: hidden
  }

  .leftQuesttion a p {
    display: block;
    overflow: hidden;
    line-height: 20px;
    color: #666;
    margin: 5px 0;
    font-size: 14px;
    max-height: 65px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    overflow: hidden
  }

  .blockLaptopGuide .rightquestion.rightleft {
    margin-right: 10px
  }

  .blockLaptopGuide .rightquestion {
    width: 30%;
    float: left;
    display: inline-block
  }

  .rightquestion a {
    display: block;
    overflow: hidden;
    padding: 10px 0;
    border-bottom: 1px solid #eee;
    height: 75px
  }

  .rightquestion:last-child {
    margin-left: 10px
  }

  .rightquestion a img {
    float: left;
    width: 126px;
    height: auto;
    margin-right: 10px
  }

  .rightquestion a h3 {
    display: block;
    overflow: hidden;
    line-height: 1.3em;
    color: #333;
    font-size: 14px;
    font-weight: 600;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    overflow: hidden
  }

  .rightquestion.news a h3 {
    -webkit-line-clamp: 3
  }

  .rightquestion a p {
    display: block;
    overflow: hidden;
    line-height: 18px;
    color: #666;
    font-size: 12px;
    margin: 5px 0;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    text-overflow: ellipsis;
    overflow: hidden
  }

  .rightquestion a.viewallquestion {
    font-family: Arial;
    font-size: 13px;
    line-height: 15px;
    color: #4a90e2;
    text-align: center;
    height: auto;
    border: 0;
    margin-top: 8px;
    width: 280px;
    float: right;
    font-weight: bold
  }

  .bm-question a.viewallquestion:after {
    content: "";
    display: inline-block;
    overflow: hidden;
    vertical-align: middle;
    width: 5px;
    height: 5px;
    border-right: 1px solid #4a90e2;
    border-bottom: 1px solid #4a90e2;
    transform: rotate(-45deg);
    margin-left: 5px
  }

  [class^="iconnews-"],
  [class*="iconnews-"] {
    background-image: url(/Content/desktop/images/laptop/newsdesktop-v6@2x.png);
    background-size: 390px 224px;
    background-repeat: no-repeat;
    display: inline-block;
    height: 30px;
    width: 30px;
    line-height: 30px;
    vertical-align: middle
  }

  .iconnews-comcya {
    background-position: -85px -20px;
    width: 11px;
    height: 10px;
    margin: -4px 1px 0 0;
    margin-right: 3px
  }

  .iconnews-comorg {
    background-position: -100px -20px;
    width: 11px;
    height: 10px;
    margin: -4px 1px 0 0;
    margin-right: 3px
  }

  .cate44 .homeproduct .item.feature label.netFee {
    top: 262px !important
  }

  /* 10:35:52 19/02/2020 */
  .homeproduct li.feature img {
    width: 480px;
    height: auto;
    margin: 0 0 14px
  }

  .laptopcate .homeproduct li.feature img.samehome {
    width: 480px;
    height: auto;
    margin: 0 0 14px
  }

  @media screen and (max-width:320px) {
    .homeproduct li h3 {
      font-size: 11px !important
    }

    .homeproduct li label {
      font-size: 10px
    }

    .homeproduct li.feature label {
      top: 75% !important
    }
  }

  .homeproduct li.feature label {
    right: 3% !important;
    top: 78% !important;
    left: auto !important
  }

  .homeproduct li h3 {
    font-size: 13px
  }

  @media screen and (max-width:1200px) {
    .homeproduct li.feature img {
      width: 100%;
      height: auto
    }

    .laptopcate .homeproduct li.feature img.samehome {
      width: 100%;
      height: auto
    }
  }

  /* 02:01:56 11/02/2020 */
  .stickcompare {
    display: block;
    background: #fff;
    position: fixed;
    bottom: 0;
    z-index: 99;
    width: 100%;
    max-height: 180px;
    box-shadow: 0 0 1px 0 rgba(0, 0, 0, .25)
  }

  .stickcompare .small {
    position: absolute;
    right: 0;
    top: -39px
  }

  .stickcompare .small ul {
    float: right;
    width: 200px;
    background: #fff;
    border-radius: 10px 10px 0 0;
    border: 1px solid #ddd;
    border-bottom: 0
  }

  .stickcompare .small li {
    float: left;
    padding: 10px 6px;
    font-size: 14px;
    color: #666;
    font-weight: 600;
    cursor: pointer
  }

  .stickcompare .small li i {
    width: 0;
    height: 0;
    border-top: 6px solid #288ad6;
    border-left: 6px solid transparent;
    border-right: 6px solid transparent;
    position: relative;
    top: 6px;
    margin-left: 5px;
    float: right
  }

  .stickcompare .small li i.v2 {
    border-bottom: 6px solid #288ad6;
    border-top: none
  }

  .stickcompare .small li:first-child {
    color: #288ad6
  }

  .stickcompare .small li:last-child {
    color: red
  }

  .stickcompare .small li span {
    float: left;
    font-size: 12px;
    color: #999;
    margin: 0
  }

  .stickcompare .comlist {
    *display: block;
    display: table;
    max-width: 1198px;
    width: 100%;
    margin: 0 auto;
    border-left: 1px solid #ddd
  }

  .stickcompare .comlist li {
    *float: left;
    display: table-cell;
    vertical-align: middle;
    padding: 20px 1% 20px 1%;
    border-right: 1px solid #ddd;
    position: relative
  }

  .stickcompare .comlist li:last-child {
    border: 0
  }

  .stickcompare .comlist li img {
    float: left;
    width: 80px;
    height: 80px;
    margin-right: 10px
  }

  .stickcompare .comlist li figure {
    overflow: hidden;
    max-width: 220px;
    max-height: 150px
  }

  .stickcompare .comlist li h3 {
    display: block;
    line-height: 1.3em;
    font-size: 14px;
    color: #444;
    margin-bottom: 3px;
    font-weight: 600;
    width: 200px;
    white-space: nowrap;
    overflow: hidden;
    text-overflow: ellipsis
  }

  .stickcompare .comlist li strong {
    float: left;
    font-size: 13px;
    color: #d0021b
  }

  .stickcompare .comlist li label {
    color: #888;
    font-size: 12px;
    text-decoration: line-through;
    margin-left: 5px
  }

  .stickcompare .comlist li div {
    display: block;
    font-size: 12px;
    color: #666;
    clear: both
  }

  .stickcompare .comlist li p {
    clear: both
  }

  .stickcompare .comlist li figure span {
    text-decoration: none;
    font-size: 12px;
    color: #333;
    float: none;
    display: block;
    line-height: 18px
  }

  .stickcompare .comlist li button {
    position: absolute;
    top: 4px;
    right: 5px;
    cursor: pointer;
    background: #fff;
    border: 1px solid #ddd;
    border-radius: 20px;
    width: 20px;
    height: 20px
  }

  .stickcompare .comlist li button sub {
    position: absolute;
    left: -1px;
    top: 0;
    right: 0;
    bottom: 0;
    width: 14px;
    height: 14px;
    margin: auto;
    font-size: 14px;
    color: #999;
    line-height: 1
  }

  .stickcompare .comlist li form {
    position: relative;
    display: block
  }

  .stickcompare .comlist li form button {
    width: 35px;
    height: 34px;
    border: 0;
    border-radius: 0;
    position: absolute;
    top: 1px;
    right: 1px
  }

  .stickcompare .comlist li input[type="search"] {
    display: block;
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    font-size: 14px;
    color: #666
  }

  .stickcompare .comlist li .viewdisable {
    display: block;
    padding: 10px;
    background: #d5d6d7;
    border-radius: 5px;
    font-size: 16px;
    text-transform: uppercase;
    color: #9e9e9e;
    text-align: center;
    width: 60%;
    margin: auto
  }

  .stickcompare .comlist li .viewfullcomp {
    display: block;
    padding: 10px;
    background: #288ad6;
    border-radius: 5px;
    font-size: 16px;
    text-transform: uppercase;
    color: #fff;
    text-align: center;
    width: 80%;
    margin: auto
  }

  .stickcompare .comlist li .textmin {
    font-size: 12px;
    color: #888;
    display: block;
    line-height: 18px;
    text-align: center;
    margin-top: 5px
  }

  .stickcompare .search-suggestion-wrapper {
    position: absolute;
    margin-left: 60px;
    margin-top: 2px
  }

  .stickcompare .search-suggestion-wrapper .search-suggestion-list {
    background: #fff;
    border: 1px solid #ccc;
    font-size: 12px;
    line-height: 18px;
    position: absolute;
    bottom: 40px;
    left: -59px;
    width: 263px;
    z-index: 1000
  }

  .stickcompare .search-suggestion-wrapper .search-suggestion-list li {
    height: 30px;
    margin: 0 !important;
    padding: 0 !important;
    text-align: left;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    max-width: 355px;
    display: inline-block !important;
    width: 100%
  }

  .stickcompare .search-suggestion-wrapper .search-suggestion-list a {
    color: #333
  }

  .stickcompare .search-suggestion-wrapper .search-suggestion-list li.selected,
  .stickcompare .search-suggestion-wrapper .search-suggestion-list li:hover {
    background-color: #2889d6;
    color: #fff
  }

  .stickcompare .search-suggestion-wrapper .search-suggestion-list li a {
    display: inline-block;
    width: 100%;
    padding-left: 5px;
    vertical-align: -webkit-baseline-middle
  }

  .stickcompare .search-suggestion-wrapper .search-suggestion-list li:hover a,
  .stickcompare .search-suggestion-wrapper .search-suggestion-list li.selected a {
    color: #fff;
    vertical-align: -webkit-baseline-middle
  }

  .icontgdd-scomp {
    background-position: -175px -85px;
    width: 18px;
    height: 18px;
    position: absolute;
    top: 8px;
    right: 10px
  }
</style>

<div class="filter">
  <div class="manu manu14">
    <a href="/dtdd-apple-iphone" data-id="80" class=""><img src="//cdn.tgdd.vn/Brand/1/iPhone-(Apple)42-b_16.jpg"></a>
    <a href="/dtdd-samsung" data-id="2" class=""><img src="//cdn.tgdd.vn/Brand/1/Samsung42-b_25.jpg"></a>
    <a href="/dtdd-oppo" data-id="1971" class=""><img src="//cdn.tgdd.vn/Brand/1/OPPO42-b_9.png"></a>
    <a href="/dtdd-xiaomi" data-id="2235" class=""><img src="//cdn.tgdd.vn/Brand/1/Xiaomi42-b_45.jpg"></a>
    <a href="/dtdd-vivo" data-id="2236" class=""><img src="//cdn.tgdd.vn/Brand/1/Vivo42-b_50.jpg"></a>
    <a href="/dtdd-realme" data-id="17201" class=""><img src="//cdn.tgdd.vn/Brand/1/Realme42-b_37.png"></a>
    <a href="/dtdd-vsmart" data-id="17566" class=""><img src="//cdn.tgdd.vn/Brand/1/Vsmart42-b_40.png"></a>
    <a href="/dtdd-nokia" data-id="1" class="hide"><img src="//cdn.tgdd.vn/Brand/1/Nokia42-b_21.jpg"></a>
    <a href="javascript:;" class="morecate" onclick="$(this).hide();$(this).parent().find('a').removeClass('hide');">Xem
      thêm</a>
    <a href="/dtdd-huawei" data-id="104" class="hide"><img src="//cdn.tgdd.vn/Brand/1/Huawei42-b_30.jpg"></a>
    <a href="/dtdd-mobell" data-id="19" class="hide"><img src="//cdn.tgdd.vn/Brand/1/Mobell42-b_19.jpg"></a>
    <a href="/dtdd-itel" data-id="5332" class="hide"><img src="//cdn.tgdd.vn/Brand/1/Itel42-b_54.jpg"></a>
    <a href="/dtdd-coolpad" data-id="2327" class="hide"><img src="//cdn.tgdd.vn/Brand/1/Coolpad42-b_33.png"></a>
    <a href="/dtdd-blackberry" data-id="100" class="hide"><img src="//cdn.tgdd.vn/Brand/1/BlackBerry42-b_38.png"></a>
    <a href="/dtdd-masstel" data-id="4832" class="hide"><img src="//cdn.tgdd.vn/Brand/1/Masstel42-b_0.png"></a>
  </div>
  <div class="fl price">
    <label>Chọn mức giá: </label>
    <a href="/dtdd?p=duoi-2-trieu" class=" " data-id="7">
      Dưới 2 triệu
    </a>
    <a href="/dtdd?p=tu-2-4-trieu" class=" " data-id="9">
      Từ 2 - 4 triệu
    </a>
    <a href="/dtdd?p=tu-4-7-trieu" class=" " data-id="289">
      Từ 4 - 7 triệu
    </a>
    <a href="/dtdd?p=tu-7-13-trieu" class=" " data-id="562">
      Từ 7 - 13 triệu
    </a>
    <a href="/dtdd?p=tren-13-trieu" class=" " data-id="253">
      Trên 13 triệu
    </a>
  </div>
  <div class="fl feature">
    <span class="criteria">Tính năng</span>
    <div class="property">
      <a href="javascript:;" class="closefilter"><i class="icontgdd-closefilter"></i></a>
      <div class="prop ">
        <strong>Loại điện thoại</strong>
        <a href="/dtdd?g=dien-thoai-pho-thong" class="" data-id="62879">
          <i class="icontgdd-checkbox"></i>
          Điện thoại phổ thông
        </a>
        <a href="/dtdd?g=android" class="" data-id="39237">
          <i class="icontgdd-checkbox"></i>
          Android
        </a>
        <a href="/dtdd?g=iphone-ios" class="" data-id="39238">
          <i class="icontgdd-checkbox"></i>
          iPhone (iOS)
        </a>
      </div>
      <div class="prop ">
        <strong>Dung lượng pin</strong>
        <a href="/dtdd-pin-3000-den-5000-mah" class="" data-id="163466">
          <i class="icontgdd-checkbox"></i>
          Từ 3000 đến 5000 mAh
        </a>
        <a href="/dtdd-pin-khung" class="" data-id="163467">
          <i class="icontgdd-checkbox"></i>
          Pin khủng trên 5000 mAh
        </a>
      </div>
      <div class="prop ">
        <strong>Kiểu màn hình</strong>
        <a href="/dtdd-man-hinh-sieu-tran-vien" class="" data-id="140891">
          <i class="icontgdd-checkbox"></i>
          Siêu tràn viền
        </a>
        <a href="/dtdd-man-hinh-tran-vien" class="" data-id="140890">
          <i class="icontgdd-checkbox"></i>
          Tràn viền (tai thỏ, giọt nước...)
        </a>
      </div>
      <div class="yesno">
        <strong>Tính năng đặc biệt</strong>
        <a href="/dtdd?f=bao-mat-khuon-mat" class="" data-id="16430" data-smoothurl="">
          <i class="icontgdd-checkbox"></i>
          Bảo mật khuôn mặt
        </a>
        <a href="/dtdd?f=bao-mat-van-tay" class="" data-id="9009" data-smoothurl="">
          <i class="icontgdd-checkbox"></i>
          Bảo mật vân tay
        </a>
        <a href="/dtdd?f=sac-pin-nhanh" class="" data-id="10882" data-smoothurl="">
          <i class="icontgdd-checkbox"></i>
          Sạc pin nhanh
        </a>
        <a href="/dtdd-sac-khong-day" class="" data-id="19880" data-smoothurl="sac-khong-day">
          <i class="icontgdd-checkbox"></i>
          Sạc không dây
        </a>
        <a href="/dtdd?f=chong-nuoc-bui" class="" data-id="7760" data-smoothurl="">
          <i class="icontgdd-checkbox"></i>
          Chống nước, bụi
        </a>
      </div>
      <a href="javascript:;" class="morefeature"
        onclick="$(this).parent().find('div').removeClass('hide');$(this).remove();">Xem thêm tính năng khác</a>
      <div class="prop hide">
        <strong>Tính năng camera</strong>
        <a href="/dtdd-camera-goc-rong" class="" data-id="140894">
          <i class="icontgdd-checkbox"></i>
          Có camera góc rộng
        </a>
        <a href="/dtdd-camera-xoa-phong" class="" data-id="140895">
          <i class="icontgdd-checkbox"></i>
          Có camera xóa phông
        </a>
        <a href="/dtdd-camera-macro" class="" data-id="163409">
          <i class="icontgdd-checkbox"></i>
          Có camera macro chụp cận cảnh
        </a>
        <a href="/dtdd-camera-zoom" class="" data-id="140896">
          <i class="icontgdd-checkbox"></i>
          Có camera zoom chụp xa
        </a>
      </div>
      <div class="prop hide">
        <strong>Kích thước màn hình</strong>
        <a href="/dtdd-tu-6-inch" class="" data-id="40435">
          <i class="icontgdd-checkbox"></i>
          Màn hình lớn 6 inch trở lên
        </a>
        <a href="/dtdd-nho-gon" class="" data-id="163351">
          <i class="icontgdd-checkbox"></i>
          Nhỏ gọn dễ cầm
        </a>
      </div>
      <div class="prop hide">
        <strong>Chất liệu vỏ</strong>
        <a href="/dtdd?g=kim-loai-nguyen-khoi" class="" data-id="57279">
          <i class="icontgdd-checkbox"></i>
          Kim loại
        </a>
        <a href="/dtdd?g=kim-loai-va-kinh" class="" data-id="57311">
          <i class="icontgdd-checkbox"></i>
          Kim loại và kính
        </a>
      </div>
      <p class="doit"></p>
      <p class="cslder">
        <span class="cswrap">
          <span class="csdot"></span>
          <span class="csdot"></span>
          <span class="csdot"></span>
        </span>
      </p>
    </div>
  </div>
  <div class="fl barpage">
    <a href="?s=moi-ra-mat" data-id="moi-ra-mat" class="">
      <i class="icontgdd-checkbox"></i> Mới
    </a>
    <a href="?s=tra-gop-0-phan-tram" data-id="tra-gop-0-phan-tram" class="">
      <i class="icontgdd-checkbox"></i> Trả góp 0%
    </a>
    <a href="?s=doc-quyen" data-id="doc-quyen" class="">
      <i class="icontgdd-checkbox"></i> Độc quyền
      <span class="n">MỚI</span> </a>
  </div>
  <div class="fr sort">
    <span class="criteria">Sắp xếp</span>
    <div>
      <label class="closefilter"><i class="icontgdd-closefilter"></i></label>
      <a href="javascript:;" class="check" data-id="5"><i class="icontgdd-checklist"></i>Nổi bật nhất</a>
      <a href="javascript:;" data-id="6"><i class="icontgdd-checklist"></i>Bán chạy nhất</a>
      <a href="javascript:;" data-id="1"><i class="icontgdd-checklist"></i>Giá cao đến thấp</a>
      <a href="javascript:;" data-id="2"><i class="icontgdd-checklist"></i>Giá thấp đến cao</a>
    </div>
  </div>
</div>
<h1 class="h1">Điện thoại nổi bật nhất</h1>
<ul class="homeproduct  ">
  @if(isset($products))
  @foreach ($products as $product)
  <li class="item" data-productid="216174" data-position="2" data-display="3" data-representid="0">
    <a href="{{ route('get.detail.product', [$product->pro_slug,$product->id]) }}">
      <img width="180" height="180"
        src="{{ pare_url_file($product->pro_avatar) }}">
      <h3>{{ $product->pro_name }}</h3>
    <div class="price"><strong>{{ number_format($product->pro_price) }}₫</strong></div>
      <div class="ratingresult">
        <i class="icontgdd-ystar"></i>
        <i class="icontgdd-ystar"></i>
        <i class="icontgdd-ystar"></i>
        <i class="icontgdd-ystar"></i>
        <i class="icontgdd-gstar"></i>
        <span>24 đánh giá</span>
      </div>
      <h6 class="textkm"></h6>
      <div class="promo noimage">
        <p> Tặng 2 suất mua Đồng hồ thời trang giảm 40% (không áp dụng thêm khuyến mãi khác)</p>
      </div>
      <label class="installment">Trả góp 0%</label> 
    </a>
  </li>
  @endforeach
  @endif

</ul>
<a href="javascript:More(false, 0)" class="viewmore">Xem thêm 134 điện thoại</a>
<!-- block tin tức cho laptop  -->

@stop

@section('script')
<script defer="defer" async="async" src="https://cdn.tgdd.vn/v2015/Scripts/desktop/V6/category.min.v202005151130.js">
</script>
@stop