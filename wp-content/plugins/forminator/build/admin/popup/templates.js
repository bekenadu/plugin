!function(e){formintorjs.define(["text!tpl/dashboard.html"],function(t){return Backbone.View.extend({className:"wpmudev-popup--quiz",step:"1",template:"blank",events:{"click .select-quiz-template":"selectTemplate","click .sui-dialog-close":"close","change .forminator-new-form-type":"clickTemplate","click #forminator-build-your-form":"handleMouseClick",keyup:"handleKeyClick"},popupTpl:Forminator.Utils.template(e(t).find("#forminator-form-popup-tpl").html()),newFormTpl:Forminator.Utils.template(e(t).find("#forminator-new-form-tpl").html()),newFormContent:Forminator.Utils.template(e(t).find("#forminator-new-form-content-tpl").html()),render:function(){var e=jQuery("#forminator-popup");"1"===this.step&&(this.$el.html(this.popupTpl({templates:Forminator.Data.modules.custom_form.templates})),this.$el.find(".select-quiz-template").prop("disabled",!1),e.removeClass("sui-dialog-sm")),"2"===this.step&&(this.$el.html(this.newFormTpl()),this.$el.find(".sui-box-body").html(this.newFormContent()),"registration"===this.template&&(this.$el.find("#forminator-template-register-notice").show(),this.$el.find("#forminator-form-name").val(Forminator.l10n.popup.registration_name)),"login"===this.template&&(this.$el.find("#forminator-template-login-notice").show(),this.$el.find("#forminator-form-name").val(Forminator.l10n.popup.login_name)),e.addClass("sui-dialog-sm"))},close:function(e){e.preventDefault(),Forminator.New_Popup.close()},clickTemplate:function(e){this.$el.find(".select-quiz-template").prop("disabled",!1)},selectTemplate:function(e){e.preventDefault();var t=this.$el.find("input[name=forminator-form-template]:checked").val();this.template=t,this.step="2",this.render()},handleMouseClick:function(e){this.createQuiz(e)},handleKeyClick:function(e){e.preventDefault(),13===e.which&&this.createQuiz(e)},createQuiz:function(t){var o=e(t.target).closest(".sui-box").find("#forminator-form-name");if(""===o.val().trim())e(t.target).closest(".sui-box").find(".sui-error-message").show();else{var i=Forminator.Data.modules.custom_form.new_form_url;e(t.target).closest(".sui-box").find(".sui-error-message").hide(),form_url=i+"&name="+o.val(),form_url=form_url+"&template="+this.template,window.location.href=form_url}}})})}(jQuery);