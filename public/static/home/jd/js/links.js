(function($) {
	var frm_sel = "#frm_submit";
	var submit_sel = '#btnSubmit';
	var initFormValid = function() {
		$(frm_sel).validate({
			rules: {
				name: {
					required: true,
					maxlength: 100
				},
				url: {
					required: true,
					url: true,
					maxlength: 100
				},
				email: {
					required: true,
					email: true,
					maxlength: 50
				}
			},
			messages: {
				name: {
					required: "6666666666666-����",
					maxlength: "��վ���Ƴ���ֻ����1-100λ�ַ�֮��"
				},
				url: {
					required: "����д��ַ��������1-100λ�ַ�֮��",
					url: "��ַ��ʽ����ȷ",
					maxlength: "��ַ����ֻ����1-100λ�ַ�֮��"
				},
				email: {
					required: "����д�������䣬������1-50λ�ַ�֮��",
					email: "���������ʽ����ȷ",
					maxlength: "�������䳤��ֻ����1-50λ�ַ�֮��"
				}
			}
		});
	};
	
	var submitSuccess = function(){
		alert('�������ύ����ȴ�����Ա��ˣ�');
		$(submit_sel).val('�ύ����');
		$('#name,#email,#intro').val('');
		$('#url').val('http://');
	}
	
	var submitError = function(){
		alert('�ύʧ�ܣ����Ժ�����');
		$(submit_sel).val('�ύ����');
	};
	
	var submit = function() {
		if (!$(frm_sel).valid()) {
			return;
		}
		$(submit_sel).unbind('click').attr('value', '���ڱ���');
		$.ajax({
			type: "POST",
			contentType: "application/x-www-form-urlencoded;",
			url: "//club.jd.com/links/submit.action",
			data: {
				name: encodeURIComponent($('#name').val()),
				url: encodeURIComponent($('#url').val()),
				email: encodeURIComponent($('#email').val()),
				intro: encodeURIComponent($('#intro').val())
			},
			dataType: "json",
			complete: function(jqXHR, textStatus){
				$(submit_sel).click(submit);
			},
			success: function(data) {
				if(data.success){
					submitSuccess();
				}else{
					submitError();
				}
			},
			error: function(xhr) {
				submitError();
			}
		});
	};
	var initSubmit = function() {
		$(submit_sel).click(submit);
	};

	$(function() {
		initFormValid();
		initSubmit();
	});
})(jQuery);
