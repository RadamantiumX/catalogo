document.addEventListener('DOMContentLoaded', function() {
    const triggers = document.querySelectorAll('.faq-drawer__trigger');
  
    triggers.forEach(trigger => {
      trigger.addEventListener('change', function() {
        if (this.checked) {
          triggers.forEach(otherTrigger => {
            if (otherTrigger !== this) {
              otherTrigger.checked = false;
            }
          });
        }
      });
    });
  });

  
  