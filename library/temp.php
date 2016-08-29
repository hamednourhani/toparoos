.articles-block{
@extend .white-box;
margin-bottom : 20px;
.articles-list{
margin : 0px;
padding : 0px;
a.article-unit{
@extend .def-transition;
background-color: $grey2;
margin-bottom : 10px;
text-align : center;
padding-top : 10px;
@include border-radius(3px);
@include span-columns(12,12);
@include at-breakpoint($small $medium){
padding-top : 0px;
@include span-columns(4,12);
&:nth-of-type(3n){
@include omega;
}
}
@include at-breakpoint($medium){
padding-top : 0px;
@include span-columns(3,12);
&:nth-of-type(4n){
@include omega;
}
}
.article-thumb{

img{
max-width : 100%;
height : auto;

}
}
.article-detail {
.article-title {
position: relative;
text-align: center;
padding-bottom: 3px;
display: block;
margin-top: -3px;
margin-bottom: 0px;
&::after {
@extend .def-transition;
display: block;
content: "";
width: 0px;
height: 2px;
background-color: $red;
position: absolute;
top: -6px;
right: 0;
}
}
.article-desc{
font-size : 90%;
padding: 5px 5px 5px;
display: block;
}
}

&:hover{
.article-title::after{
width : 100%;
left : 0px;
}
}

}
}
.more-articles-container {
overflow: hidden;
a.more-articles {
float : left;
position: relative;
display: inline-block;
padding-right : 10px;
font-size: 90%;
i:before{
padding-right : 5px;
vertical-align: middle;
}
&:before{
left : 100%;
width : 1000%;
background-color: $grey1;
content : "";
top : 46%;
display : inline-block;
position: absolute;
height: 2px;
}
}
}
}