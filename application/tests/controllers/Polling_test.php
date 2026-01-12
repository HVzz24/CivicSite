<?php
class Polling_test extends TestCase {

    public function test_polling_with_active_poll() {
        $this->resetInstance();
        $this->CI->load->model('model_utama');

        $this->CI->model_utama = $this->getMockBuilder('Model_utama')
            ->setMethods(['view_where'])
            ->getMock();

        $this->CI->model_utama->expects($this->at(0))
            ->method('view_where')
            ->with('poling', ['aktif' => 'Y', 'status' => 'Pertanyaan'])
            ->will($this->returnValue((object)['row_array' => function() { return ['pilihan' => 'What is your favorite color?']; }]));

        $this->CI->model_utama->expects($this->at(1))
            ->method('view_where')
            ->with('poling', ['aktif' => 'Y', 'status' => 'Jawaban'])
            ->will($this->returnValue((object)['result_array' => function() { return [['id_poling' => 1, 'pilihan' => 'Red'], ['id_poling' => 2, 'pilihan' => 'Blue']]; }]));

        $output = $this->CI->load->view('civicsite/sidebar_kanan', [], true);

        $this->assertStringContainsString('What is your favorite color?', $output);
        $this->assertStringContainsString('Red', $output);
        $this->assertStringContainsString('Blue', $output);
    }

    public function test_polling_with_no_active_poll() {
        $this->resetInstance();
        $this->CI->load->model('model_utama');
        $this->CI->model_utama = $this->getMockBuilder('Model_utama')
            ->setMethods(['view_where'])
            ->getMock();

        $this->CI->model_utama->expects($this->once())
            ->method('view_where')
            ->with('poling', ['aktif' => 'Y', 'status' => 'Pertanyaan'])
            ->will($this->returnValue((object)['row_array' => function() { return null; }]));

        $output = $this->CI->load->view('civicsite/sidebar_kanan', [], true);

        $this->assertStringNotContainsString('POLLING', $output);
    }
}
?>