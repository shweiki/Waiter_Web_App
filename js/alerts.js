(function($) {
  showSwal = function(type){
        'use strict';
        if(type === 'basic'){
        	swal({
            text: 'لا يمكن حذف  يوجد بيانات مرتبطة في هذا الحقل',
            icon: 'warning',
            button: {
              text: "متابعة",
              value: true,
              visible: true,
              className: "mdc-button mdc-button--raised"
            }
          })

    	}else if(type === 'title-and-text'){
        swal({
          title: 'Read the alert!',
          text: 'Click OK to close this alert',
          button: {
            text: "OK",
            value: true,
            visible: true,
            className: "mdc-button mdc-button--raised"
          }
        })

    	}else if(type === 'success-message'){
        swal({
          title: 'تم العملية بنجاح !!!',
          text: 'تم حفط بيانات بنجاح',
          icon: 'success',
          button: {
            text: "متابعة",
            value: true,
            visible: true,
            className: "mdc-button mdc-button--raised"
          }
        })

    	}else if(type === 'auto-close'){
            swal({
              title: 'تم العملية بنجاح',
              text: 'تم حذف البيانات بنجاح',
              icon: 'success',
              timer: 3000,
              button: false
            }).then(
            function () {},
              // handling the promise rejection
            function (dismiss) {
              if (dismiss === 'timer') {
                console.log('I was closed by the timer')
              }
            }
          )
    	}else if(type === 'warning-message-and-cancel'){
            swal({
              title: 'Are you sure?',
              text: "You won't be able to revert this!",
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3f51b5',
              cancelButtonColor: '#ff4081',
              confirmButtonText: 'Great ',
              buttons: {
                cancel: {
                  text: "Cancel",
                  value: null,
                  visible: true,
                  className: "mdc-button mdc-button--raised",
                  closeModal: true,
                },
                confirm: {
                  text: "OK",
                  value: true,
                  visible: true,
                  className: "mdc-button mdc-button--raised",
                  closeModal: true
                }
              }
            })

    	}else if(type === 'custom-html'){
        	swal({
            content: {
              element: "input",
              attributes: {
                placeholder: "Type your password",
                type: "password",
                class: 'mdc-text-field__input'
              },
            },
            button: {
              text: "OK",
              value: true,
              visible: true,
              className: "mdc-button mdc-button--raised"
            }
          })
    	}
        }

})(jQuery);
