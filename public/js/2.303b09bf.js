(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[2],{"713b":function(t,r,o){"use strict";o.r(r);var a=function(){var t=this,r=t.$createElement,a=t._self._c||r;return a("q-layout",{attrs:{view:"lHh Lpr lFf"}},[a("div",{staticClass:"row no-wrap shadow-2"},[a("q-toolbar",{staticClass:"col-9 bg-primary text-white"},[a("q-avatar",{attrs:{square:""}},[a("img",{attrs:{clickable:"",alt:"4um logo",src:o("cf05")},on:{click:t.redirect}})]),a("q-toolbar-title",[t._v("\n        4um - your forum\n      ")])],1),a("q-toolbar",{staticClass:"col-3 bg-primary"},[a("q-space"),a("q-tabs",[a("div",{staticClass:"row q-px-md text-white"},[t.isLoggedIn?a("div",{staticClass:"row"},[a("q-btn",{attrs:{flat:"",icon:"add"},on:{click:function(r){return t.$router.push("/creator")}}}),a("q-btn",{attrs:{flat:"",icon:"favorite"},on:{click:function(r){return t.$router.push("/favorities")}}}),"admin"==t.role||"moderator"==t.role?a("div",[a("q-btn",{attrs:{flat:"",label:"Verify posts"},on:{click:function(r){return t.$router.push("/verify")}}})],1):t._e(),a("q-btn",{attrs:{flat:"",label:"Log out"},on:{click:t.logout}})],1):a("div",{staticClass:"row"},[a("q-route-tab",{attrs:{to:"/login",label:"Login"}}),a("q-route-tab",{attrs:{to:"/register",label:"Register"}})],1)])]),t.isLoggedIn&&t.notification>0?a("div",{staticClass:"col-2"},[a("q-chip",{attrs:{color:"red","text-color":"white",clickable:"",size:"md"}},[t.isLoggedIn?a("q-avatar",{key:t.update,attrs:{outlined:""}},[t.avatar?a("img",{attrs:{clickable:"",src:t.avatar},on:{click:function(r){return t.$router.push("/profile")}}}):a("img",{attrs:{clickable:"",src:"https://4um.polarlooptheory.pl/img/avatar.png"},on:{click:function(r){return t.$router.push("/profile")}}})]):t._e(),a("div",{on:{click:function(r){return t.$router.push("/notifications")}}},[t._v("\n            "+t._s(t.notification)+"\n          ")])],1)],1):a("div",{staticClass:"col-2"},[a("q-chip",{attrs:{color:"transparent","text-color":"transparent"}},[t.isLoggedIn?a("q-avatar",{key:t.update,attrs:{outlined:""}},[t.avatar?a("img",{attrs:{clickable:"",src:t.avatar},on:{click:function(r){return t.$router.push("/profile")}}}):a("img",{attrs:{clickable:"",src:"https://4um.polarlooptheory.pl/img/avatar.png"},on:{click:function(r){return t.$router.push("/profile")}}})]):t._e()],1)],1)],1)],1),a("q-page-container",[a("router-view")],1)],1)},e=[],i={mounted(){this.notifications=this.$store.state.forum.notifications.length,this.avatar=this.$store.state.forum.user_avatar},data(){return{text:"",notifications:0,avatar:null,update:0}},computed:{isLoggedIn(){return this.$store.state.forum.accessToken},role(){return this.$store.state.forum.user_role},notification(){return this.$store.state.forum.notifications.length}},methods:{redirect(){this.isLoggedIn&&(this.$router.push("/"),this.update+=1)},logout(){this.$store.dispatch("forum/logout",{}),this.$root.$emit("unsubscribe")}}},n=i,s=o("2877"),c=o("4d5a"),l=o("65c6"),u=o("cb32"),A=o("6ac5"),d=o("27f9"),p=o("0016"),f=o("2c91"),g=o("429b"),m=o("9c40"),b=o("7867"),h=o("b047"),w=o("09e3"),v=o("eebe"),q=o.n(v),C=Object(s["a"])(n,a,e,!1,null,null,null);r["default"]=C.exports;q()(C,"components",{QLayout:c["a"],QToolbar:l["a"],QAvatar:u["a"],QToolbarTitle:A["a"],QInput:d["a"],QIcon:p["a"],QSpace:f["a"],QTabs:g["a"],QBtn:m["a"],QRouteTab:b["a"],QChip:h["a"],QPageContainer:w["a"]})},cf05:function(t,r){t.exports="data:image/png;base64,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"}}]);