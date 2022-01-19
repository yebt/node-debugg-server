from http.server import HTTPServer, BaseHTTPRequestHandler

class debugHandler(BaseHTTPRequestHandler):
    def do_GET(self):
        self.send_response(200)
        self.send_header('content-type', 'text/html')
        self.end_headers()
        print("asdfasd")
        self.wfile.write('Hello, World'.encode())
    def do_POST(self):
        self.send_response(200)
        self.send_header('content-type', 'application/json')
        self.end_headers()
        print("debug:--")


def main():
    PORT = 8000
    server = HTTPServer(('', PORT), debugHandler)
    print('Server running at http://localhost:%s' % PORT)
    server.serve_forever()

if __name__ == '__main__':
    main()
