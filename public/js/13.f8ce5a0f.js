(window["webpackJsonp"]=window["webpackJsonp"]||[]).push([[13],{ff4c:function(t,e,s){"use strict";s.r(e);var a=function(){var t=this,e=t.$createElement,s=t._self._c||e;return s("q-page",{staticClass:"row justify-center"},[s("div",{staticClass:"column q-pa-sm q-ma-sm"},[s("div",{staticClass:"row"},[s("q-card",{staticClass:"shadow-24",staticStyle:{width:"1000px"},attrs:{square:""}},[s("q-card-section",[s("div",{key:t.updateList,staticClass:"row justify-between"},[s("q-btn",{attrs:{dense:"",round:"",flat:"",icon:"arrow_back"},on:{click:function(e){return t.$router.go(-1)}}}),s("q-btn",{attrs:{dense:"",round:"",flat:"",color:t.btnColor,icon:t.btnIcon},on:{click:t.followThread}})],1),s("div",{staticClass:"q-px-lg q-ma-lg text-h4"},[t._v("\n            "+t._s(t.title)+"\n            "),s("q-separator")],1)]),s("q-card-section",[s("div",{staticClass:"q-px-lg q-mx-sm"},[s("div",{staticClass:"text-h6"},[t._v("\n              "+t._s(t.text)+"\n            ")])])]),s("q-card-section",[s("div",{staticClass:"row q-mt-md q-px-xl text-secondary"},t._l(t.tags,(function(e){return s("q-list",{key:e.id,staticClass:"q-px-lg",attrs:{separator:"",square:""}},[s("div",{staticClass:"col"},[t._v("\n                  #"+t._s(e.name)+"\n                ")])])})),1),s("div",{staticClass:"row q-px-xl q-ma-xs items-center"},[s("div",{staticClass:"col-1"},[s("q-icon",{attrs:{color:"secondary",size:"sm",name:"comment"}}),t._v("\n              "+t._s(t.number_of_posts)+"\n            ")],1),s("div",{key:t.updateList,staticClass:"col-2"},[s("q-btn",{attrs:{dense:"",outline:!t.clickedUp,push:"",size:"sm",color:"green-5",icon:"expand_less"},on:{click:function(e){return t.voteForThread(1)}}}),t._v("\n                  "+t._s(t.score)+"\n              "),s("q-btn",{attrs:{dense:"",outline:!t.clickedDown,push:"",size:"sm",color:"red-5",icon:"expand_more"},on:{click:function(e){return t.voteForThread(-1)}}})],1),s("q-space"),this.user_id==this.$store.state.forum.user_id?s("div",{staticClass:"col-2 text-secondary"},[s("q-btn",{attrs:{dense:"",flat:"",icon:"edit",label:"Edit","no-caps":""},on:{click:function(e){return t.$router.push({path:"/editor/"+t.id})}}})],1):t._e(),this.user_id==this.$store.state.forum.user_id?s("div",{staticClass:"col-2 text-secondary"},[s("q-btn",{attrs:{dense:"",flat:"",icon:"delete",label:"Delete","no-caps":""},on:{click:t.deleteThread}})],1):t._e(),s("div",{staticClass:"col-2 text-secondary"},[t._v("\n              "+t._s(t.moment(t.created_at).format("DD/MM/YYYY HH:mm:ss"))+"\n            ")]),s("div",{staticClass:"col-2"},[s("div",{staticClass:"column items-center"},[s("q-avatar",{attrs:{size:"50px"}},[t.author[0].avatar_url?s("img",{attrs:{src:t.author[0].avatar_url,alt:"user_avatar"}}):s("img",{attrs:{src:"https://4um.polarlooptheory.pl/img/avatar.png",alt:"user_avatar"}})]),t._v("\n                "+t._s(t.author[0].name)+"\n              ")],1)])],1),s("q-separator")],1),s("q-card-section",[s("div",{staticClass:"q-px-lg"},[[s("div",{staticClass:"q-pa-sm"},[s("q-input",{staticClass:"full-height q-pt-md",attrs:{label:"Type your comment here",filled:"",type:"text",counter:"",maxlength:"255","input-style":{resize:"none"}},scopedSlots:t._u([{key:"after",fn:function(){return[s("q-btn",{attrs:{round:"",flat:"",icon:"send"},on:{click:t.addPost}})]},proxy:!0}]),model:{value:t.postText,callback:function(e){t.postText=e},expression:"postText"}})],1)]],2)]),s("q-card-section",[[s("div",{key:t.updateList,staticClass:"div"},t._l(t.posts,(function(e,a){return s("q-list",{key:e.id,staticClass:"q-px-lg q-ma-md",attrs:{separator:"",square:""}},[[s("q-item",{staticClass:"column q-pt-md q-ma-md shadow-1",attrs:{outlined:""}},[s("q-item-section",{staticClass:"col"},[t._v("\n                    "+t._s(e.text)+"\n                  ")]),s("q-item-section",{staticClass:"col q-pt-sm"},[s("div",{staticClass:"row items-end"},[s("div",{staticClass:"col-2"},[s("q-btn",{attrs:{dense:"",flat:"",size:"md",color:"secondary","no-caps":"",label:"Reply",icon:"reply"},on:{click:function(e){return t.showMe(a)}}})],1),e.user_id==t.logged_user_id?s("div",{staticClass:"col-2 text-secondary"},[s("q-btn",{attrs:{dense:"",flat:"",icon:"delete","no-caps":"",label:"Delete"},on:{click:function(s){return t.deletePost(e.id,a)}}})],1):t._e(),s("q-space"),s("div",{staticClass:"col-3 items-start text-secondary"},[t._v("\n                        "+t._s(t.moment(e.created_at).format("DD/MM/YYYY HH:mm:ss"))+"\n                      ")]),s("div",{staticClass:"col-2"},[s("div",{staticClass:"column items-center"},[s("q-avatar",{attrs:{size:"50px"}},[e.author[0].avatar_url?s("img",{attrs:{src:e.author[0].avatar_url,alt:"user_avatar"}}):s("img",{attrs:{src:"https://4um.polarlooptheory.pl/img/avatar.png",alt:"user_avatar"}})]),t._v("\n                          "+t._s(e.author[0].name)+"\n                        ")],1)])],1)])],1),s("q-list",{staticClass:"q-pl-lg q-ma-md",attrs:{separator:"",square:""}},[t._l(e.comments,(function(e){return s("q-item",{key:e.id,staticClass:"column q-pt-md q-ma-md shadow-1",attrs:{outlined:""}},[s("q-item-section",{staticClass:"col"},[t._v("\n                          "+t._s(e.text)+"\n                        ")]),s("q-item-section",{staticClass:"col q-pt-sm"},[s("div",{staticClass:"row items-end"},[e.user_id==t.logged_user_id?s("div",{staticClass:"col-2 text-secondary"},[s("q-btn",{attrs:{dense:"",flat:"",icon:"delete","no-caps":"",label:"Delete"},on:{click:function(s){return t.deleteComment(e.id)}}})],1):t._e(),s("q-space"),s("div",{staticClass:"col-3 items-start text-secondary q-px-md"},[t._v("\n                              "+t._s(t.moment(e.created_at).format("DD/MM/YYYY HH:mm:ss"))+"\n                            ")]),s("div",{staticClass:"col-2"},[s("div",{staticClass:"column items-center"},[s("q-avatar",{attrs:{size:"50px"}},[e.author[0].avatar_url?s("img",{attrs:{src:e.author[0].avatar_url,alt:"user_avatar"}}):s("img",{attrs:{src:"https://4um.polarlooptheory.pl/img/avatar.png",alt:"user_avatar"}})]),t._v("\n                                "+t._s(e.author[0].name)+"\n                              ")],1)])],1)])],1)})),s("div",{directives:[{name:"show",rawName:"v-show",value:t.showInput[a],expression:"showInput[index]"}],key:t.updateList,staticClass:"q-px-lg"},[s("div",{staticClass:"q-pa-sm"},[s("q-input",{staticClass:"full-height q-pt-md",attrs:{label:"Type your answer here",filled:"",type:"text",counter:"",maxlength:"255","input-style":{resize:"none"}},scopedSlots:t._u([{key:"after",fn:function(){return[s("q-btn",{attrs:{squared:"",flat:"",icon:"send"},on:{click:function(s){return t.addComment(e.id)}}})]},proxy:!0}],null,!0),model:{value:t.commentText,callback:function(e){t.commentText=e},expression:"commentText"}})],1)])],2)]],2)})),1)]],2)],1)],1)])])},i=[],o=(s("ddb0"),s("2b27")),r=s.n(o),l=s("2b0e"),d=s("c1df"),n=s.n(d),c=s("2a19");l["a"].use(r.a);var u={created(){this.retrieveData()},mounted(){let t=new Pusher("4c6c0d7a3990f71c7c1d",{cluster:"eu"}),e=t.subscribe("thread-update-"+this.$route.params.id);this.test();e.bind("thread-updated",this.test.bind(this))},props:["post"],data(){return{updateList:0,clickedUp:!1,clickedDown:!1,logged_user_id:this.$store.state.forum.user_id,favorite:!1,btnColor:"default",btnIcon:"favorite_border",postText:"",commentText:"",id:null,user_id:null,title:"aaa",text:"",created_at:null,updated_at:null,deleted_at:null,number_of_followers:null,score:null,posts:[{id:null,user_id:null,thread_id:null,text:"",created_at:null,updated_at:null,deleted_at:null,accepted:1,comments:[{id:null,text:"",user_id:null,post_id:null,created_at:null,updated_at:null,deleted_at:null}]}],number_of_posts:null,tags:[],votes:[{name:"",pivot:[{thread_id:null,user_id:null,value:null,created_at:null,updated_at:null}]}],followers:[{name:"",user_id:null}],author:[{id:null,name:"",email:null,email_verified_at:null,created_at:null,updated_at:null,avatar_url:""}],showInput:[],isFollowing:!1}},methods:{moment:function(t){return n()(t)},showMe(t){this.showInput[t]=!this.showInput[t],this.updateList+=1},retrieveData(){this.$axios.request({url:"/api/forum/get-thread?thread_id="+this.$route.params.id,method:"get",baseURL:"https://www.4um.polarlooptheory.pl",headers:{Authorization:"Bearer "+r.a.get("token")}}).then((t=>{this.id=t.data.data.id,this.user_id=t.data.data.user_id,this.title=t.data.data.title,this.text=t.data.data.text,this.created_at=t.data.data.created_at,this.updated_at=t.data.data.updated_at,this.deleted_at=t.data.data.deleted_at,this.number_of_followers=t.data.data.number_of_followers,this.score=t.data.data.score,this.posts=t.data.data.posts,this.number_of_posts=t.data.data.number_of_posts,this.tags=t.data.data.tags,this.votes=t.data.data.votes,this.followers=t.data.data.followers,this.author=t.data.data.author;for(var e=0;e<this.number_of_posts;e++)this.showInput[e]=!1;for(const s of this.votes)s.pivot.user_id==this.logged_user_id&&(1==s.pivot.value?(this.clickedUp=!0,this.clickedDown=!1):-1==s.pivot.value?(this.clickedUp=!1,this.clickedDown=!0):(this.clickedUp=!1,this.clickedDown=!1));for(const s of this.followers)s.user_id==this.logged_user_id&&(this.isFollowing=!0,this.btnColor="red",this.btnIcon="favorite")}))},changeMe(){this.favorite=!this.favorite,0==this.favorite?(this.btnColor="default",this.btnIcon="favorite_border"):(this.btnColor="red",this.btnIcon="favorite")},deleteThread(){this.$store.dispatch("forum/deleteThread",{thread_id:this.id,quasar:this.$q})},addPost(){this.$store.dispatch("forum/sendPost",{text:this.postText,thread_id:this.id,quasar:this.$q}),this.postText="",c["a"].create({message:"Wait, your post is being verfied",caption:n()(Object(d["now"])()).format("DD/MM/YYYY HH:mm:ss")})},addPost2(){this.$axios.request({url:"/api/forum/add-post",method:"post",baseURL:"https://www.4um.polarlooptheory.pl",headers:{"Content-Type":"application/json",Authorization:"Bearer "+r.a.get("token")},data:{text:this.postText,thread_id:this.id}}).then((t=>{200===t.status&&(console.log("Post sent successfully"),this.postText="")})).catch((t=>{console.log(t)}))},deletePost(t,e){this.$store.dispatch("forum/deletePost",{post_id:t,quasar:this.$q})},addComment(t){this.$store.dispatch("forum/sendComment",{text:this.commentText,post_id:t,quasar:this.$q}),this.commentText=""},deleteComment(t){this.$store.dispatch("forum/deleteComment",{comment_id:t,quasar:this.$q})},voteForThread(t){this.clickedUp&&1==t?(this.clickedUp=!1,this.$store.dispatch("forum/voteForThread",{thread_id:this.id,score:0,quasar:this.$q})):this.clickedDown&&-1==t?(this.clickedDown=!1,this.$store.dispatch("forum/voteForThread",{thread_id:this.id,score:0,quasar:this.$q})):this.clickedUp||this.clickedDown||(t>0?this.clickedUp=!0:t<0&&(this.clickedDown=!0),this.$store.dispatch("forum/voteForThread",{thread_id:this.id,score:t,quasar:this.$q}))},followThread(){this.isFollowing?(this.$store.dispatch("forum/followThread",{thread_id:this.id,follow:0,quasar:this.$q}),this.isFollowing=!1,this.btnColor="default",this.btnIcon="favorite_border"):(this.$store.dispatch("forum/followThread",{thread_id:this.id,follow:1,quasar:this.$q}),this.isFollowing=!0,this.btnColor="red",this.btnIcon="favorite")},test(){this.retrieveData(),console.log("Thread data retrieved")}}},h=u,p=s("2877"),m=s("9989"),_=s("f09f"),v=s("a370"),f=s("9c40"),q=s("eb85"),x=s("1c1c"),w=s("0016"),b=s("2c91"),C=s("cb32"),g=s("27f9"),k=s("66e5"),y=s("4074"),T=s("eebe"),$=s.n(T),D=Object(p["a"])(h,a,i,!1,null,null,null);e["default"]=D.exports;$()(D,"components",{QPage:m["a"],QCard:_["a"],QCardSection:v["a"],QBtn:f["a"],QSeparator:q["a"],QList:x["a"],QIcon:w["a"],QSpace:b["a"],QAvatar:C["a"],QInput:g["a"],QItem:k["a"],QItemSection:y["a"]})}}]);