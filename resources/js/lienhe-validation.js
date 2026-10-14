export function validateLienHe(values) {
  const errors = {};
  const length = (value) => Array.from(value ?? '').length;

  if (length(values.name) < 2 || length(values.name) > 100) {
    errors.name = 'Vui lòng nhập họ và tên hợp lệ';
  }

  if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(values.email ?? '')) {
    errors.email = 'Email không đúng định dạng';
  } else if (length(values.email) > 255) {
    errors.email = 'Email không được vượt quá 255 ký tự';
  }

  if (!values.service) {
    errors.service = 'Vui lòng nhập dịch vụ cần tư vấn';
  } else if (length(values.service) > 150) {
    errors.service = 'Dịch vụ cần tư vấn không được vượt quá 150 ký tự';
  }

  if (length(values.message) < 10) {
    errors.message = 'Lời nhắn phải có ít nhất 10 ký tự';
  } else if (length(values.message) > 2000) {
    errors.message = 'Lời nhắn không được vượt quá 2000 ký tự';
  }

  return errors;
}
