(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[7],{ec95:function(t,a,e){"use strict";e.r(a);var s=function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("q-page",{staticClass:"row justify-center items-center"},[e("div",{staticClass:"column q-pa-sm"},[e("div",{staticClass:"row"},[e("q-card",{staticClass:"shadow-24",staticStyle:{width:"1200px"},attrs:{square:""}},[e("q-card-section",[e("div",{staticClass:"q-px-lg q-ma-md"},[e("div",{staticClass:"text-h6"},[t._v("\n              Most recent:\n            ")]),e("q-separator"),e("q-list",{staticClass:"q-pt-md"},t._l(t.threads,(function(a){return e("q-item",{directives:[{name:"ripple",rawName:"v-ripple"}],key:a.id,staticClass:"row",attrs:{clickable:""},on:{click:function(e){return t.$router.push({path:"/thread/"+a.id})}}},[e("q-item-section",{attrs:{avatar:""}},[e("q-avatar",{attrs:{size:"70px"}},[a.author[0].avatar_url?e("img",{attrs:{src:a.author[0].avatar_url}}):e("img",{attrs:{src:"https://4um.polarlooptheory.pl/img/avatar.png"}})])],1),e("q-item-section",{staticClass:"col-8"},[t._v("\n                    "+t._s(a.title)+"\n                  ")]),e("q-item-section",[e("div",{staticClass:"row items-center justify-end text-secondary"},[t._v("\n                      "+t._s(a.number_of_posts)+"\n                      "),e("q-icon",{staticClass:"q-pl-sm",attrs:{color:"secondary",name:"comment"}})],1)]),e("q-item-section",[e("div",{staticClass:"row items-center justify-center text-secondary"},[e("q-icon",{attrs:{color:"secondary",name:"expand_less"}}),t._v("\n                        "+t._s(a.score)+"\n                      "),e("q-icon",{attrs:{color:"secondary",name:"expand_more"}})],1)])],1)})),1)],1)])],1)],1)])])},r=[],n=e("2b27"),l=e.n(n),i=e("2b0e");i["a"].use(l.a);var o={name:"Dashboard",beforeCreate(){this.$axios.request({url:"/api/forum/get-threads",method:"get",baseURL:"https://www.4um.polarlooptheory.pl",headers:{Authorization:"Bearer "+l.a.get("token")}}).then((t=>{this.threads=t.data.data}))},data(){return{posts:[],threads:[{id:null,user_id:null,title:"",text:"",created_at:null,updated_at:null,deleted_at:null,number_of_followers:null,score:null,number_of_comments:null,tags:[{name:"",pivot:[{thread_id:null,tag_id:null,created_at:null,updated_at:null}]}],author:[{id:null,name:"",email:null,email_verified_at:null,created_at:null,updated_at:null,avatar_url:""}]}]}}},c=o,d=e("2877"),u=e("9989"),m=e("f09f"),p=e("a370"),_=e("eb85"),h=e("8572"),v=e("1c1c"),q=e("66e5"),f=e("4074"),w=e("cb32"),b=e("0016"),C=e("714f"),g=e("eebe"),y=e.n(g),x=Object(d["a"])(c,s,r,!1,null,null,null);a["default"]=x.exports;y()(x,"components",{QPage:u["a"],QCard:m["a"],QCardSection:p["a"],QSeparator:_["a"],QField:h["a"],QList:v["a"],QItem:q["a"],QItemSection:f["a"],QAvatar:w["a"],QIcon:b["a"]}),y()(x,"directives",{Ripple:C["a"]})}}]);