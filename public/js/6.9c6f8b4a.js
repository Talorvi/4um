(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[6],{9145:function(t,e,s){"use strict";s.r(e);var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("q-page",{staticClass:"row justify-center items-center"},[s("div",{staticClass:"column q-pa-sm"},[s("div",{staticClass:"row"},[s("q-card",{staticClass:"shadow-24",staticStyle:{width:"500px",height:"700px"},attrs:{square:""}},[s("q-card-section",{staticClass:"bg-primary q-pa-sm"},[s("div",{staticClass:"row items-center"},[s("q-btn",{attrs:{size:"lg",color:"white",dense:"",round:"",flat:"",icon:"arrow_back"},on:{click:function(e){return t.$router.go(-1)}}}),s("q-icon",{staticClass:"q-px-md",attrs:{size:"lg",dense:"",name:"post_add",color:"white"}}),s("h5",{staticClass:"text-h5 text-white q-my-md"},[t._v("Thread")])],1)]),s("q-card-section",[s("q-form",{on:{submit:t.onSubmit}},[s("div",{staticClass:"q-px-lg"},[[s("div",{staticClass:"q-pa-md"},[s("q-input",{staticClass:"q-pt-md",attrs:{label:"Title",filled:"",type:"text",counter:"",maxlength:"25","input-style":{resize:"none"}},model:{value:t.title,callback:function(e){t.title=e},expression:"title"}}),s("q-input",{staticClass:"full-height q-pt-md",attrs:{label:"Text",filled:"",type:"textarea",counter:"",maxlength:"255","input-style":{resize:"none"}},model:{value:t.text,callback:function(e){t.text=e},expression:"text"}}),s("q-input",{staticClass:"q-pt-lg",attrs:{hint:"Separate tags with space",label:"Tags",filled:"",type:"text","input-style":{resize:"none"}},model:{value:t.tags,callback:function(e){t.tags=e},expression:"tags"}})],1)]],2),s("div",{staticClass:"q-pa-lg q-ma-sm"},[s("q-btn",{staticClass:"full-width text-white",attrs:{unelevated:"",size:"md",color:"primary",label:"Send",type:"submit"}})],1)])],1)],1)],1)])])},i=[],l={data(){return{title:"",text:"",tags:"",tags_to_send:[]}},methods:{onSubmit(){""!=this.tags&&(this.tags_to_send=this.tags.split(" ")),this.$store.dispatch("forum/sendThread",{title:this.title,text:this.text,tags:this.tags_to_send,quasar:this.$q})}}},n=l,r=s("2877"),c=s("9989"),o=s("f09f"),d=s("a370"),u=s("9c40"),p=s("0016"),m=s("0378"),h=s("27f9"),g=s("eebe"),q=s.n(g),x=Object(r["a"])(n,a,i,!1,null,null,null);e["default"]=x.exports;q()(x,"components",{QPage:c["a"],QCard:o["a"],QCardSection:d["a"],QBtn:u["a"],QIcon:p["a"],QForm:m["a"],QInput:h["a"]})}}]);