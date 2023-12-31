/*
 * @author    RocketTheme http://www.rockettheme.com
 * @copyright Copyright (C) 2007 - 2012 RocketTheme, LLC
 * @license   http://www.gnu.org/licenses/gpl-2.0.html GNU/GPLv2 only
 */
var PresetDropdown={list:{},init:function(a){PresetDropdown.list[a]=document.id(GantryParamsPrefix+a);var b=selectboxes.getObjects(PresetDropdown.list[a].getPrevious());
b.real.addEvent("change",PresetDropdown.select.bind(PresetDropdown,a));},newItem:function(i,g,f){if(!PresetDropdown.list[i]&&$$("."+i).length){return Scroller.addBlock(i,g,f);
}var h=new Element("li").set("text",f);var e=new Element("option",{value:g}).set("text",f);var d=selectboxes.getObjects(PresetDropdown.list[i].getPrevious());
var a=null;d.real.getChildren().each(function(k,j){if(k.value==g){a=j;}});if(a==null){e.inject(PresetDropdown.list[i]);h.inject(PresetDropdown.list[i].getPrevious().getLast().getElement("ul"));
PresetDropdown.attach(i);}else{var c=d.real.getChildren()[a],b=PresetDropdown.list[i].getPrevious().getLast().getElement("ul").getChildren()[a];c.replaceWith(e);
b.replaceWith(h);PresetDropdown.attach(i,a);}return true;},attach:function(a,c){var e=selectboxes.getObjects(PresetDropdown.list[a].getPrevious()),b=this;
if(c==null){c=e.list.length-1;}var d=e.list[c];d.addEvents({mouseenter:function(){e.list.removeClass("hover");this.addClass("hover");},mouseleave:function(){this.removeClass("hover");
},click:function(){e.list.removeClass("active");this.addClass("active");this.fireEvent("select",[e,c]);},select:selectboxes.select.pass(selectboxes,[e,c])});
selectboxes.updateSizes(PresetDropdown.list[a].getPrevious());d.fireEvent("select");},select:function(a){var c=Presets[a].get(PresetDropdown.list[a].getPrevious().getElement(".selected span").get("text"));
var b=document.id("master-items");if(b){b=b.hasClass("active");}$H(c).each(function(i,j){var e=document.id(GantryParamsPrefix+j);var h=e.get("tag");switch(h){case"select":var k=e.getElements("option").getProperty("value");
var g=selectboxes.getObjects(e.getParent());selectboxes.select(g,k.indexOf(i));break;case"input":var l=e.getProperty("class");e.setProperty("value",i);
if(l.contains("picker-input")){e.fireEvent("keyup");}else{if(l.contains("background-picker")){e.fireEvent("keyup",i);}else{if(l.contains("slider")){var d=window["slider"+j];
d.set(d.list.indexOf(i));}else{if(l.contains("toggle")){var f=j.replace("-","");window["toggle"+f].set(i.toInt());window["toggle"+f].fireEvent("onChange",i.toInt());
}}}}break;}});}};var Scroller={init:function(a){Scroller.wrapper=$$("."+a+" .scroller .wrapper")[0];Scroller.bar=$$("."+a+" .bar")[0];if(!Scroller.wrapper||!Scroller.bar){return;
}Scroller.hook=document.id("toolbar-delete-style");if(Scroller.hook){var c=Cookie.read("gantry-"+GantryTemplate+"-adminpresets")||"hide";Scroller.hook.getElement("a").onclick=function(){};
Scroller.hook.getElement("a").removeProperty("onclick");Scroller.buttonText("Show Presets");document.id("hack-panel").getFirst().setStyle("display","block");
Scroller.slide=new Fx.Slide("hack-panel",{onComplete:function(){if(this.open){Scroller.buttonText("Hide Presets");}else{Scroller.buttonText("Show Presets");
}}})[c=="show"?"show":"hide"]();if(c=="show"){Scroller.buttonText("Hide Presets");}else{Scroller.buttonText("Show Presets");}Scroller.hook.addEvent("click",function(f){f.stop();
if(!Scroller.slide.open){Scroller.slide.slideIn();Cookie.write("gantry-"+GantryTemplate+"-adminpresets","show");}else{Scroller.slide.slideOut();Cookie.write("gantry-"+GantryTemplate+"-adminpresets","hide");
}});}Scroller.childrens=Scroller.wrapper.getChildren();var b=Scroller.wrapper.getParent().getSize();var e=Scroller.wrapper.getSize();Scroller.barWrapper=new Element("div",{styles:{position:"absolute",left:0,bottom:0,width:Scroller.bar.getStyle("width"),height:Scroller.bar.getStyle("height")}}).inject(Scroller.bar,"before");
Scroller.getBarSize();Scroller.bar.inject(Scroller.barWrapper).setStyles({bottom:1,left:0});Scroller.children(a);var d=$$(".delete-preset");d.each(function(f){f.addEvent("click",function(g){new Event(g).stop();
Scroller.deleter(this,a);});});if(Scroller.size>b.x){return;}Scroller.bar.setStyle("width",Scroller.size);Scroller.drag(Scroller.wrapper,Scroller.bar);
},buttonText:function(a){var c=Scroller.hook.getElement("a");var b=c.getElement("span");c.set("text",a);b.inject(c,"top");},deleter:function(c,a){var b=c.id.replace("keydelete-","");
new Request.HTML({url:GantryAjaxURL,onSuccess:function(d){Scroller.deleteAction(d,c,a,b);}}).post({model:"presets-saver",action:"delete","preset-title":a,"preset-key":b});
},deleteAction:function(a,i,j,h){var e;if(PresetsKeys[j].contains(h)){i.dispose();}else{var c=i.getParent();Scroller.childrens.erase(c);var f=c.getSize().x;
c.empty().dispose();var g=Scroller.childrens.getLast().addClass("last");var d=Scroller.childrens[0].addClass("first");e=Scroller.wrapper.getStyle("width").toInt();
Scroller.wrapper.setStyle("width",e-f);var b=Math.abs(Scroller.bar.getStyle("width").toInt()-Scroller.getBarSize());Scroller.bar.setStyle("width",Scroller.getBarSize());
if(Scroller.bar.getStyle("left").toInt()>Scroller.getBarSize()/2){Scroller.bar.setStyle("left",Scroller.bar.getStyle("left").toInt()-b);}}if(Scroller.bar.getStyle("left").toInt()<Scroller.getBarSize()/2){Scroller.wrapper.getParent().scrollTo(0);
}else{Scroller.wrapper.getParent().scrollTo(e);}if(typeof CustomPresets!="undefined"&&CustomPresets[h]){delete CustomPresets[h];}},getBarSize:function(){var a=Scroller.wrapper.getParent().getSize();
var b=Scroller.wrapper.getSize();Scroller.size=a.x*Scroller.barWrapper.getStyle("width").toInt()/b.x;return Scroller.size;},addBlock:function(o,m,j){var n=Presets[o].get(j);
if(!n){if(document.id("contextual-preset-wrap").getStyle("display")=="none"){document.id("contextual-preset-wrap").setStyles({position:"absolute",top:-3000,display:"block"});
}var l=Scroller.childrens[Scroller.childrens.length-1],a=Scroller.childrens.length;var h=l.clone();h.inject(l,"after").addClass("last").className="";h.className="preset"+(a+1)+" block last";
h.getElement("span").set("html",j);l.removeClass("last");var e=h.getFirst().getStyle("background-image");var d=e.split("/");var c=d[d.length-1];var b=m+'.png")';
var k=d.join("/").replace(c,b);h.getFirst().setStyle("background-image","");h.getFirst().setStyle("background-image",k);var f=Scroller.wrapper.getStyle("width").toInt();
var g=h.getSize().x;Scroller.wrapper.setStyle("width",f+198);Scroller.bar.setStyle("width",Scroller.getBarSize());Scroller.childrens.push(h);Scroller.child(o,h);
var i=new Element("div",{id:"keydelete-"+m,"class":"delete-preset"}).set("html","<span>X</span>").inject(h);i.addEvent("click",function(p){new Event(p).stop();
Scroller.deleter(this,o);});if(document.id("contextual-preset-wrap").getStyle("display")=="block"&&document.id("contextual-preset-wrap").getStyle("top").toInt()==-3000){document.id("contextual-preset-wrap").setStyles({position:"relative",top:0,display:"none"});
}}},drag:function(b,a){Scroller.dragger=new Drag.Move(a,{container:Scroller.barWrapper,onDrag:function(){var e=Scroller.wrapper.getParent();var d=e.getSize();
var c=this.value.now.x*e.getScrollSize().x/d.x;if(c>c/2){c+=10;}else{c-=10;}e.scrollTo(c);}});Scroller.wrapper.getParent().scrollTo(0);},child:function(a,c){c.getFirst().setStyle("border","1px solid #000");
var b=new Fx.Tween(c.getFirst(),{duration:300}).set("border-color","#000");c.addEvent("click",function(d){new Event(d).stop();b.start("border-color","#fff").chain(function(){this.start("border-color","#000");
}).chain(function(){this.start("border-color","#fff");}).chain(function(){this.start("border-color","#000");});Scroller.updateParams(a,c);});},children:function(a){Scroller.childrens.each(function(d,b){d.getFirst().setStyle("border","1px solid #000");
var c=new Fx.Tween(d.getFirst(),{duration:300}).set("border-color","#000");Scroller.labs=new Hash({});Scroller.involved=$$(".presets-involved");Scroller.involvedFx=[];
Scroller.involved.each(function(e){Scroller.involvedFx.push(new Fx.Tween(e,{link:"cancel"}).set("opacity",0));});d.addEvent("click",function(f){new Event(f).stop();
c.start("border-color","#fff").chain(function(){this.start("border-color","#000");}).chain(function(){this.start("border-color","#fff");}).chain(function(){this.start("border-color","#000");
});Scroller.updateParams(a,d,b);});});},updateParams:function(i,b,e){var j=b.getElement("span").get("text");var g=Presets[i].get(j);var h=b.getElement(".delete-preset");
if(h){var d=h.id.replace("keydelete-","");if(CustomPresets[d]){g=CustomPresets[d];}}var a=document.id("master-items");if(a){a=a.hasClass("active");}var f={};
var c=Scroller.labs;c.each(function(k){k.each(function(m){var l=m.retrieve("gantry:text",false);if(l){m.set("text",l);m.store("gantry:notice",false);}Scroller.involved.set("text",0);
});});$H(g).each(function(s,t){if(t=="name"){return;}var m=document.id(GantryParamsPrefix+t.replace(/-/,"_"));if(!m){return;}if(!c.get(j)){c.set(j,[]);
}var o=m.get("tag");var k=m.getParent(".gantry-panel").className.replace(/[panel|\-|\s|gantry]/g,"").toInt()-1;if(!f[k]){f[k]=0;}f[k]++;Scroller.involved[k].set("text",f[k]);
var r;if(m.getParent(".gantry-field").getElement(".base-label")){r=m.getParent(".gantry-field").getElement(".base-label label");}else{r=m.getParent(".gantry-field").getElement("label");
}var p=c.get(j);if(!p.contains(r)){p.push(r);}if(!r.retrieve("gantry:notice",false)){r.store("gantry:text",r.get("html"));r.set("html",'<span class="preset-info">&#9679;</span> '+r.retrieve("gantry:text"));
r.store("gantry:notice",true);}switch(o){case"select":var u=m.getElements("option").getProperty("value");var n=selectboxes.getObjects(m.getParent());selectboxes.select(n,u.indexOf(s));
break;case"input":var v=m.getProperty("class");m.setProperty("value",s);if(v.contains("picker-input")){m.getParent().fireEvent("mouseenter");m.fireEvent("keyup");
}else{if(v.contains("background-picker")){m.fireEvent("keyup",s);}else{if(v.contains("slider")){var l=window.sliders[(GantryParamsPrefix+t.replace(/-/,"_")).replace("-","_")];
l.set(l.list.indexOf(s));l.hiddenEl.fireEvent("set",s);}else{if(v.contains("toggle")){var q=(GantryParamsPrefix+t.replace(/-/,"_")).replace("-","");q=document.id(q);
q.getParent(".toggle-container").fireEvent("mouseenter");q.fireEvent("set",[q.retrieve("details"),s.toInt()]);q.fireEvent("onChange",s.toInt());}}}}break;
}});Scroller.involved.each(function(k,l){var m=k.get("text").toInt();if(!m){Scroller.involvedFx[l].element.getParent().removeClass("double-badge");Scroller.involvedFx[l].cancel().start("opacity",[1,0]).chain(function(){this.element.setStyle("display","none");
});return;}var n=Scroller.involvedFx[l].element.getNext("span");if(n&&n.getStyle("display")=="block"){Scroller.involvedFx[l].element.getParent().addClass("double-badge");
}else{Scroller.involvedFx[l].element.getParent().removeClass("double-badge");}k.setStyle("display","block");Scroller.involvedFx[l].element.setStyle("visibility","visible");
Scroller.involvedFx[l].start("opacity",[0,1]);});}};var PresetsBadges={init:function(a){if(!PresetsBadges.list){PresetsBadges.list=new Hash();}var b=PresetsBadges.getLabel(a);
var d=[];PresetsBadges.list.set(a,[]);Presets[a].each(function(h,f){if(!d.length){for(var i in h){d.push(i);var g=PresetsBadges.getLabel(i);if(g){var e=PresetsBadges.build(i,g,b,false);
PresetsBadges.list.get(a).push(e);}}}});if(!PresetsBadges.buttons){PresetsBadges.buttons=[];}var c=PresetsBadges.build(a,b,false,d.length);PresetsBadges.buttons.push(c);
c.addEvents({click:function(f){new Event(f).stop();this.fireEvent("toggle");},show:function(){this.getElement(".number").setStyle("visibility","visible");
$$(PresetsBadges.list.get(a)).setStyle("display","block");this.showing=true;},hide:function(){this.getElement(".number").setStyle("visibility","hidden");
$$(PresetsBadges.list.get(a)).setStyle("display","none");this.showing=false;},toggle:function(){PresetsBadges.buttons.each(function(e){if(e!=c){e.fireEvent("hide");
}});if(this.showing){this.fireEvent("hide");}else{this.fireEvent("show");}}});},build:function(n,i,j,f){var b=i.getChildren(),m=i.getSize().y,g;var a=i.getElement(".presets-wrapper");
if(!a){a=new Element("div",{"class":"presets-wrapper",styles:{position:"relative"}}).inject(i,"top");b.each(a.adopt.bind(a));a.setStyle("height",m+15);
i.getElement(".hasTip").setStyle("line-height",m+15);}var l=(j)?j.getElement(".hasTip").innerHTML:GantryLang.show_parameters;g=new Element("div",{"class":"presets-badge"}).inject(a,"top");
var c=new Element("span",{"class":"left"}).inject(g);var k=new Element("span",{"class":"right"}).inject(c).set("text",l);if($chk(f)){var d=new Element("span",{"class":"number"}).inject(k);
d.set("text",f).setStyle("visibility","hidden");g.setStyle("cursor","pointer").addClass("parent");}else{g.setStyle("display","none");var e=i.getNext().getFirst().getLast();
if(e){var h=e.getStyle("top").toInt();e.setStyle("top",h-10);}}return g;},getLabel:function(a){var c=document.id(GantryParamsPrefix+a);if(c){var d=c.getParent(),b=null;
while(d&&d.get("tag")!="table"){if(d.get("tag")=="tr"){b=d;}d=d.getParent();}return b.getFirst();}else{return null;}}};